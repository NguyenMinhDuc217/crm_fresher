<?php

/**
 * Name: AnalyzeTicketFluctuationReportHandler.php
 * Author: Phu Vo
 * Date: 2021.11.20
 */

require_once('modules/Reports/custom/AnalyzeSalesFluctuationReportHandler.php');

class AnalyzeTicketFluctuationReportHandler extends AnalyzeSalesFluctuationReportHandler {

    protected $formatNumber = 'Integer';

    protected function getChartData(array $params) {
        $chartData = parent::getChartData($params);
        $chartData['ylabel'] = vtranslate('Số lượng Ticket', 'Reports');

        return $chartData;
    }

    protected function getReportData($params, $forExport = false) {
        global $adb;

        $displayedBy = (!isset($params['displayed_by']) || empty($params['displayed_by']) ? 'year' : $params['displayed_by']);
        $data = [];
        $toDate = Date('Y-m-d 23:59:59');

        if ($displayedBy == 'year') {
            $j = 12;
            $currentYear = Date('Y');
            $fromDate = ($currentYear - 1) . '-01-01';
            $seperateDate = Date('Y-01-01');
            $groupBy = 'MONTH';
            
            $data[] = [
                'name' => vtranslate('LBL_REPORT_YEAR', 'Reports') . ' ' . (int)$currentYear,
                'data' => []
            ];

            $data[] = [                
                'name' => vtranslate('LBL_REPORT_YEAR', 'Reports') . ' ' . (int)($currentYear - 1),
                'data' => []
            ];

        }
        else {
            $j = Date('t');
            $currentMonth = Date('m');
            $fromDate = Date('Y-m-01 00:00:00', strtotime(Date('Y-m-01') . ' -1 month'));
            $seperateDate = Date('Y-m-01');
            $groupBy = 'DAY';

            $data[] = [
                'name' => vtranslate('LBL_REPORT_MONTH', 'Reports') . ' ' . (int)$currentMonth,
                'data' => []
            ];

            if ($currentMonth == 1) {
                $data[] = [
                    'name' => vtranslate('LBL_REPORT_MONTH', 'Reports') . ' 12 ' . strtolower(vtranslate('LBL_REPORT_LAST_YEAR', 'Reports')),
                    'data' => []
                ];
            }
            else {
                $data[] = [
                    'name' => vtranslate('LBL_REPORT_MONTH', 'Reports') . ' ' . (int)($currentMonth - 1),
                    'data' => []
                ];
            }
        }

        for ($i = 0; $i < $j; $i++) {
            foreach ($data as $key => $values) {
                $data[$key]['data'][] = 0;
            }
        }

        // Get Ticket
        $sql = "SELECT sum_time, group_by, COUNT(ticketid) AS ticket_number
            FROM (
                SELECT IF(createdtime < '{$seperateDate}', 1, 0) AS sum_time, ticketid, {$groupBy}(createdtime) - 1 AS group_by
                FROM vtiger_troubletickets
                INNER JOIN vtiger_crmentity ON (deleted = 0 AND crmid = ticketid)
                WHERE createdtime BETWEEN '{$fromDate}' AND '{$toDate}'
            ) AS temp
            GROUP BY sum_time, group_by";

        $result = $adb->pquery($sql);

        while ($row = $adb->fetchByAssoc($result)) {
            $row = decodeUTF8($row);

            $data[$row['sum_time']]['data'][$row['group_by']] = (int)$row['ticket_number'];
        }

        return array_values($data);
    }
}