<?php

class SmgsModel extends CI_Model {

    var $id;
    var $name;
    var $senderRoadCode;
    var $senderStationCode;
    var $senderCode;
    var $sender;
    var $recipientCode;
    var $recipient;
    var $dispatchStation;
    var $specificApplicationSender;
    var $optionalMarks;
    var $shippingName;
    var $wagonNumber;
    var $carryingCapacity;
    var $axesNumber;
    var $wagonTara;
    var $stationDestination;
    var $roadDestination;
    var $roadCode;
    var $codeStationDestination;
    var $GNG;
    var $ETSNG;
    var $summaryPlace;
    var $summaryWeight;
    var $summaryPlaceWords;
    var $summaryWeightWords;
    var $transitPaymentNumber;
    var $declaredFreightValue;
    var $sealsNumber;
    var $seals;
    var $massMethodDeterm;
    var $created;
    var $updated;

    function __construct() {
        parent::__construct();
    }

    function insert($data) {
        foreach ($data as $k => $v) {
            if (!property_exists($this, $k)) {
                unset($data[$k]);
            }
        }

        $data['created'] = $data['updated'] = time();

        $this->db->insert('smgs', $data);

        return $this->db->insert_id();
    }

    function update($id, $data) {
        foreach ($data as $k => $v) {
            if (!property_exists($this, $k)) {
                unset($data[$k]);
            }
        }

        unset($data['created']);

        $data['updated'] = time();

        $this->db->update('smgs', $data, array('id' => $id));
    }

    function get($limit = 10) {
        $query = $this->db->get('smgs', $limit);

        return $query->result_object();
    }

    function get_one_by_id($id) {
        $query = $this->db->get_where('smgs', array('id' => $id), 1);

        return $query->first_row();
    }

    function delete_by_id($id) {
        $this->db->where('id', $id);
        $this->db->delete('smgs');
    }

}
