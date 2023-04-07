<?php

/*
	System auto-generated on 2023-04-06 05:01:54 pm by admin. 
*/

$relationships = array(
    array(
        'leftSideModule' => 'CPDemoo',
        'rightSideModule' => 'Leads',
        'relationshipType' => '1:N',
        'relationshipName' => 'LBL_LEAD_LIST',
        'enabledActions' => array(
            'ADD'
        ),
        'listingFunctionName' => 'get_dependents_list',
        'leftSideReferenceFieldName' => null,
        'rightSideReferenceFieldName' => 'related_cpdemoo'
    )
);

