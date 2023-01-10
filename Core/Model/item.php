<?php

namespace Core\Model;

use Core\Base\Model;

class item extends Model
{


    public function Top(): array {
        $data=array();
        for ($COUNTER = 0; $COUNTER <= 4; $COUNTER++) {
            $result=$this->connection->query("SELECT * FROM $this->table ORDER BY buying_price DESC LIMIT 5");
        }
        if ($result->num_rows > 0) {
            while ($row=$result->fetch_object()) {
                $data[]=$row;
            }
        }
        return $data;
    }
}


