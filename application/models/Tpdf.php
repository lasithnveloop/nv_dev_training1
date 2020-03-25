<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Tpdf extends CI_Model {
    
    public function create($data){
        // $this->load->library('pdf');
        $pdf = new CI_Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
        $pdf->SetTitle('My Title');
        $pdf->SetHeaderMargin(30);
        $pdf->SetTopMargin(20);
        $pdf->setFooterMargin(20);
        $pdf->SetAutoPageBreak(true);
        $pdf->SetDisplayMode('real', 'default');
$pdf->SetFont('helvetica', '', 10); 
        $pdf->AddPage();
        $tr = "";
        if(count($data) > 0){
            $count = 1;
            foreach($data as $row){
                if($count % 16 == 0){
                    $tr .= '<tcpdf method="AddPage" />';
                }
        $params = $pdf->serializeTCPDFtagParameters(array($row->id, 'C39', '', '',30, 8, 0.4, array('position'=>'S', 'border'=>false, 'fgcolor'=>array(0,0,0), 'bgcolor'=>array(255,255,255), 'text'=>false, 'font'=>'helvetica', 'fontsize'=>4, 'stretchtext'=>4), 'N'));

                $tr .= '<tr>
                <td style="padding: 10px; valign: center; text-align: left; border-top: 1px solid #eceeef;" valign="center" align="left">'.$row->id .'</td>
                <td style="padding: 10px; valign: center; text-align: left; border-top: 1px solid #eceeef;" valign="center" align="left">'.$row->emp_name .'</td>
                <td style="padding: 10px; valign: center; text-align: left; border-top: 1px solid #eceeef;" valign="center" align="left">'.$row->emp_role .'</td>
                <td style="padding: 10px; valign: center; text-align: left; border-top: 1px solid #eceeef;" valign="center" align="left">'.$row->emp_contact .'</td>
                <td style="padding: 10px; valign: center; text-align: left; border-top: 1px solid #eceeef;" valign="center" align="left"><tcpdf method="write1DBarcode" params="'.$params.'" /></td>
                </tr>';
                $count ++;
            }
        }
        else{
            $tr = '<tr><td>No Records Available!</td></tr>';
        }

        $html = '
                <h2> Employee Record sheet </h2><br>
                
                <div class="table-body">
                <table class="table" style="width: 100%; max-width: 100%; margin-bottom: 8px;" width="100%" align="center" cellpadding="3" >
                <thead>
                    <tr class="">
                    <th scope="col" style="padding: 10px; text-align: left; border-top: 1px solid #eceeef; vertical-align: bottom; border-bottom: 2px solid #eceeef; font-size: 12px bold;" padding="200px" align="left" valign="bottom" >Id</th>
                    <th scope="col" style="padding: 10px; text-align: left; border-top: 1px solid #eceeef; vertical-align: bottom; border-bottom: 2px solid #eceeef; font-size: 12px bold;" padding="200px" align="left" valign="bottom" >Full name</th>
                    <th scope="col" style="padding: 10px; text-align: left; border-top: 1px solid #eceeef; vertical-align: bottom; border-bottom: 2px solid #eceeef; font-size: 12px bold;" padding="200px" align="left" valign="bottom" >Role</th>
                    <th scope="col" style="padding: 10px; text-align: left; border-top: 1px solid #eceeef; vertical-align: bottom; border-bottom: 2px solid #eceeef; font-size: 12px bold;" padding="200px" align="left" valign="bottom" >Contact</th>
                    <th scope="col" style="padding: 10px; text-align: left; border-top: 1px solid #eceeef; vertical-align: bottom; border-bottom: 2px solid #eceeef; font-size: 12px bold;" padding="200px" align="left" valign="bottom" >Barcode</th>
                    </tr>
                </thead>
                <tbody>
                '.$tr.'
                </tbody>
                </table>
                
                </div>';
        // output the HTML content
        $pdf->writeHTML($html, true, false, true, false, '');
        
        // $pdf->writeHTML($html);
        $pdf->Output('My-File-Name.pdf', 'i');
    }
}