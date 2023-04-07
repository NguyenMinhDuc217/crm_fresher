<!-- Added by Minh Duc on 03.04.2023 -->
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