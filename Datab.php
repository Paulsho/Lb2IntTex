<?php

require_once __DIR__ . "/vendor/autoload.php";

class Datab
{

    private \MongoDB\Collection $Datab;

    public function __construct()
    {
        $client = new \MongoDB\Client("mongodb://127.0.0.1/");
        $this->Datab = $client->Datab->Databs;
    }

    function processor($processor): void
    {
        $statement = $this->Datab->find(["processor" => $processor]);
        echo "<div id='content0'>";
        echo "<table>";
        echo " <tr>
         <th> Ім'я мережі | </th>
         <th> Материнська плата | </th>
         <th> Виробник | </th>
         <th> Процесор </th>
        </tr> ";
        foreach ($statement->toArray() as $data) {
            echo " <tr>
             <th> {$data['netname']}  </th>
             <th> {$data['motherboard']} </th>
             <th> {$data['vendor']} </th>
             <th> {$data["processor"]} </th>
            </tr> ";
        }
        echo "</table></div>";
    }

    function software($software): void
    {
        $statement = $this->Datab->find(["software" => $software]);
        echo "<div id='content0'>";
        echo "<table>";
        echo " <tr>
         <th> Ім'я мережі | </th>
         <th> Материнська плата | </th>
         <th> Виробник | </th>
         <th> Програмне ззбеспечення </th>
        </tr> ";
        foreach ($statement->toArray() as $data) {
            echo " <tr>
             <th> {$data['netname']}  </th>
             <th> {$data['motherboard']} </th>
             <th> {$data['vendor']} </th>
             <th> {$data["software"]} </th>
            </tr> ";
        }
        echo "</table></div>";
    }

    function guarantee(): void
    {
        $now = new MongoDB\BSON\UTCDateTime(date("U")."000");
        $statement = $this->Datab->find(["guarantee" => ['$lte' => $now]] );
        echo "<div id='content0'>";
        echo "<table>";
        echo " <tr>
         <th> Ім'я мережі | </th>
         <th> Материнська плата | </th>
         <th> Виробник | </th>
         <th> Гарантія </th>
        </tr> ";
        foreach ($statement->toArray() as $data) {
            $date = date("Y-m-d", substr(strval($data["guarantee"]), 0, -3));
            echo " <tr>
             <th> {$data['netname']}  </th>
             <th> {$data['motherboard']} </th>
             <th> {$data['vendor']} </th>
             <th> $date </th>
            </tr> ";
        }
        echo "</table></div>";
    }
}