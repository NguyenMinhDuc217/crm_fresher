<!-- Added by Minh Duc on 2023-04-03 -->
<?php
    $displayParams = array(
        'scripts' => '
            <link type="text/css" rel="stylesheet" href="{vresource_url("modules/Accounts/resources/EditView.css")}">
			<script type="text/javascript" src="{vresource_url("modules/Accounts/resources/EditView.js")}"></script>
        ',
        'form' => array(
            'hiddenFields' => '

            ',
        ),
        'fields' => array(
            'accounts_business_type' => array(
                'customTemplate' => '{include file="modules/Accounts/tpls/BusinessTypeEditview.tpl"}',
            ),
        ),
    );
?>
<!-- End Minh Duc -->