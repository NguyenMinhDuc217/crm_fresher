{*
    CustomPrintReport
    Author: Hieu Nguyen
    Date: 2018-12-09
    Purpose: to print custom reports
*}

<script type="text/javascript" src="libraries/jquery/jquery.min.js"></script>
<!DOCTYPE>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>{'LBL_PRINT_REPORT'|@vtranslate:$MODULE}</title>
        <style type="text/css" media="print,screen">
            {literal}
                .printReport{
                    width:100%;
                    border:1px solid #000000;
                    border-collapse:collapse;
                }
                .printReport tbody td{
                    border:1px dotted #000000;
                    text-align:left;
                }
                .printReport thead th{
                    border-bottom:2px solid #000000;
                    border-left:1px solid #000000;
                    border-top:1px solid #000000;
                    border-right:1px solid #000000;
                }
                thead {
                    display:table-header-group;
                }
                tbody {
                    display:table-row-group;
                }
            {/literal}
        </style>
    </head>
    <body marginheight="0" marginwidth="0" leftmargin="0" topmargin="0" style="text-align:center;" onLoad="JavaScript:window.print()">
        {$PRINT_DATA}
    </body>
    <script>
        {literal}
            jQuery(document).ready(function () {
                var splitted = false;
                // chrome and safari doesn't support table-header-group option
                if (jQuery.browser.webkit) {
                    function splitTable(table, maxHeight) {
                        var header = table.children("thead");
                        if (!header.length)
                            return;

                        var headerHeight = header.outerHeight();
                        var header = header.detach();

                        var splitIndices = [0];
                        var rows = table.children("tbody").children();

                        maxHeight -= headerHeight;
                        var currHeight = 0;
                        var reportHeader = jQuery('.reportPrintHeader');
                        if (reportHeader.length > 0) {
                            currHeight = reportHeader.outerHeight();
                        }
                        rows.each(function (i, row) {
                            currHeight += $(rows[i]).outerHeight();
                            if (currHeight > maxHeight) {
                                splitIndices.push(i);
                                currHeight = $(rows[i]).outerHeight();
                            }
                        });
                        splitIndices.push(undefined);

                        table = table.replaceWith('<div id="_split_table_wrapper"></div>');
                        table.empty();

                        for (var i = 0; i < splitIndices.length - 1; i++) {
                            var newTable = table.clone();
                            header.clone().appendTo(newTable);
                            $('<tbody />').appendTo(newTable);
                            rows.slice(splitIndices[i], splitIndices[i + 1]).appendTo(newTable.children('tbody'));
                            newTable.appendTo("#_split_table_wrapper");
                            if (splitIndices[i + 1] !== undefined) {
                                $('<div style="page-break-after: always; margin:0; padding:0; border: none;"></div>').appendTo("#_split_table_wrapper");
                            }
                        }
                    }

                    if (window.matchMedia) {
                        var mediaQueryList = window.matchMedia('print');
                        mediaQueryList.addListener(function (mql) {
                            if (mql.matches && splitted == 0) {
                                var height = window.screen.availHeight;
                                $(function () {
                                    splitTable($(".reportPrintData"), height);
                                })
                                splitted = 1;
                            }
                        });
                    }
                }
            });
        {/literal}
    </script>
</html>