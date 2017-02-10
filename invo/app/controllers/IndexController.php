<?php

class IndexController extends ControllerBase
{
    public function initialize()
    {
        $this->tag->setTitle('Welcome');
        parent::initialize();
    }

    public function indexAction()
    {

        if (!$this->request->isPost()) {

            $this->flash->notice('This is a sample application of the Phalcon Framework.
                Please don\'t provide us any personal information. Thanks');
            $this->flash->success('This is a sample application of the Phalcon Framework.
                Please don\'t provide us any personal information. Thanks');

        }
    }

    public function downExcelAction(){
        include APP_PATH . "/app/library/excel/PHPExcel.php";
        $objPHPExcel = new \PHPExcel();

        $objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A1','用户编号')
            ->setCellValue('B1','用户名')
            ->setCellValue('C1','用户密码');
        /*$i = 2;

        foreach ($user as $key => $value) {
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('A'.$i, $value['id'])
                ->setCellValue('B'.$i, $value['username'])
                ->setCellValue('C'.$i, $value['password']);
            $i++;
        }*/


        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setWidth(15);

        $objPHPExcel->setActiveSheetIndex(0);
        ob_end_clean();
        ob_start();
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename=交易报表-'.date('YmdHis').'.xls');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');exit;
    }

    public function testAction(){
        echo 'good';exit;
    }
}
