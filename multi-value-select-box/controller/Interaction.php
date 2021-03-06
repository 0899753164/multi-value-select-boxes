<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Interaction extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
    }
    public function getId()
    {
        $this->security->get_csrf_token_name();
        $this->security->get_csrf_hash();
        if (!empty($this->input->post('query'))) {
            $arr_id = json_decode($this->input->post('query'));
        }
        foreach ($arr_id as $value) {
            $proId=$value;
            // example mock fake array data
            $data = array(
                    "0" => array(
                        "pId"=> "001",
                        "pbarcode"=> "33261562",
                        "pNameTH"=> "Famotidine",
                        "pNameEN"=> "Famotidine"
                    ),
                    "1" => array(
                        "pId"=> "002",
                        "pbarcode"=> "51079027",
                        "pNameTH"=> "Quinidine Gluconate",
                        "pNameEN"=> "Quinidine Gluconate"
                    ),
                    "2" => array(
                        "pId"=> "003",
                        "pbarcode"=> "57344159",
                        "pNameTH"=> "Acetaminophen",
                        "pNameEN"=> "Acetaminophen"
                    ),
                        "3" => array(
                        "pId"=> "004",
                        "pbarcode"=> "68196456",
                        "pNameTH"=> "simply right nicotine",
                        "pNameEN"=> "Nicotine Polacrilex"
                    ),
                    "4" => array(
                        "pId"=> "005",
                        "pbarcode"=> "35356763",
                        "pNameTH"=> "MethylPREDNISolone",
                        "pNameEN"=> "methylprednisolone"
                    ),
                    "5" => array(
                        "pId"=> "006",
                        "pbarcode"=> "43269637",
                        "pNameTH"=> "Orange Cinnamon Antibacterial Foaming Hand Wash",
                        "pNameEN"=> "Triclosan"
                    ),
                    "6" => array(
                        "pId"=> "007",
                        "pbarcode"=> "636294588",
                        "pNameTH"=> "pravastatin sodium",
                        "pNameEN"=> "pravastatin sodium"
                    ),
                    "7" => array(
                        "pId"=> "008",
                        "pbarcode"=> "575201018",
                        "pNameTH"=> "Chemtox",
                        "pNameEN"=> "Triticum aestivum"
                    ),
                    "8" => array(
                        "pId"=> "009",
                        "pbarcode"=> "00676441",
                        "pNameTH"=> "Triaminic",
                        "pNameEN"=> "ACETAMINOPHEN"
                    ),
                    "9" => array(
                        "pId"=> "0010",
                        "pbarcode"=> "545694605",
                        "pNameTH"=> "SINGULAIR",
                        "pNameEN"=> "montelukast sodium"
                    ),
                    "10" => array(
                        "pId"=> "0011",
                        "pbarcode"=> "58411126",
                        "pNameTH"=> "SHISEIDO UV PROTECTIVE COMPACT (REFILL)",
                        "pNameEN"=> "OCTINOXATE, OCTOCRYLENE, and TITANIUM DIOXIDE"
                    ),
                    "11" => array(
                        "pId"=> "0012",
                        "pbarcode"=> "66992399",
                        "pNameTH"=> "Regimex",
                        "pNameEN"=> "benzphetamine hydrochloride"
                    ),
                    "12" => array(
                        "pId"=> "0013",
                        "pbarcode"=> "54505327",
                        "pNameTH"=> "Dextroamphetamine Sulfate",
                        "pNameEN"=> "Dextroamphetamine Sulfate"
                    ),
                    "13" => array(
                        "pId"=> "0014",
                        "pbarcode"=> "548685549",
                        "pNameTH"=> "sotalol hydrochloride",
                        "pNameEN"=> "sotalol hydrochloride"
                    ),
                    "14" => array(
                        "pId"=> "0015",
                        "pbarcode"=> "10544151",
                        "pNameTH"=> "acyclovir",
                        "pNameEN"=> "acyclovir"
                    ),
                    "15" => array(
                        "pId"=> "0016",
                        "pbarcode"=> "68462229",
                        "pNameTH"=> "Lamotrigine",
                        "pNameEN"=> "Lamotrigine"
                    ),
                    "16" => array(
                        "pId"=> "0017",
                        "pbarcode"=> "57910401",
                        "pNameTH"=> "Ibuprofen",
                        "pNameEN"=> "Ibuprofen"
                    ),
                    "17" => array(
                        "pId"=> "0018",
                        "pbarcode"=> "47682135",
                        "pNameTH"=> "Medique Medi Seltzer",
                        "pNameEN"=> "ASPIRIN, CITRIC ACID, SODIUM BICARBONATE"
                    ),
                    "18" => array(
                        "pId"=> "0019",
                        "pbarcode"=> "605050257",
                        "pNameTH"=> "Desmopressin Acetate",
                        "pNameEN"=> "desmopressin acetate"
                    ),
                    "19" => array(
                        "pId"=> "0020",
                        "pbarcode"=> "51668201",
                        "pNameTH"=> "Koh Gen Do Maifanshi UV Face Powder",
                        "pNameEN"=> "titanium dioxide"
                    )
                );
            if (!empty($arr_id)) {
                $data = array_filter($data, function ($arr) use ($proId) {
                    if (stripos($arr['pbarcode'], $proId) !== false) {
                        return true;
                    }
                    return false;
                });
            }
            // Append array element's key to the
            //result array
            $result[] = $data;
        }
        echo  json_encode($result, true);
    }
}
?>