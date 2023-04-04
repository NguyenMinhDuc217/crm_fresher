CREATE TABLE IF NOT EXISTS `table_name` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` int(11) DEFAULT '0',
  `recordid` int(11) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `potential_id` varchar(250) DEFAULT NULL,
  `quote_id` varchar(250) DEFAULT NULL,
  `createdtime` varchar(250) DEFAULT NULL,
  `duedate` varchar(250) DEFAULT NULL,
  `vtiger_purchaseorder` varchar(200) DEFAULT NULL,
  `hdnS_H_Amount` decimal(25,8) DEFAULT NULL,
  `account_id` varchar(250) DEFAULT NULL,
  `currency_id` varchar(250) DEFAULT NULL,
  `conversion_rate` decimal(10,3) DEFAULT NULL,
  `pre_tax_total` decimal(25,8) DEFAULT NULL,
  `ship_street` varchar(250) DEFAULT NULL,
  `bill_street` varchar(250) DEFAULT NULL,
  `ship_city` varchar(30) DEFAULT NULL,
  `bill_city` varchar(30) DEFAULT NULL,
  `ship_state` varchar(30) DEFAULT NULL,
  `bill_state` varchar(30) DEFAULT NULL,
  `ship_country` varchar(30) DEFAULT NULL,
  `bill_country` varchar(30) DEFAULT NULL,
  `terms_conditions` text,
  `productid` varchar(250) DEFAULT NULL,
  `quantity` decimal(25,3) DEFAULT NULL,
  `listprice` decimal(27,8) DEFAULT NULL,
  `discount_amount` decimal(25,8) DEFAULT NULL,
  `discount_percent` decimal(25,3) DEFAULT NULL,
  `tax1` varchar(250) DEFAULT NULL,
  `tax2` varchar(250) DEFAULT NULL,
  `tax3` varchar(250) DEFAULT NULL,
  `hdnTaxType` varchar(25) DEFAULT NULL,
  `sostatus` varchar(200) DEFAULT NULL,
  `invoicestatus` varchar(200) DEFAULT NULL,
  `assigned_user_id` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;