<?php


namespace app\controllers\pharmacy;

use app\core\Controller;
use app\core\ExceptionHandler;
use app\core\Logger;
use app\core\NotificationHandler;
use app\core\Request;
use app\models\PharmacyOrderModel;
use app\models\Stock;
use Composer\Util\ErrorHandler;

class PharmacyInventoryController extends Controller
{
    public function getInventoryByUsername($username)
    {
        $stock = new Stock();
        $results = $stock->getStock($username);

        if ($results) {
            return $results;
        } else {
            return false;
        }
    }

    public function transformMedicineName(mixed $medID)
    {
        $stock = new Stock();
        $medicine = $stock->getMedicine($medID);

        if ($medicine) {
            return $medicine['medName'] . " <br> " . $medicine['weight'] . " mg ";
        } else {
            return "";
        }
    }

    public function remainingDays(mixed $remaining_days): string
    {
        if ($remaining_days <= 7) {
            return "danger";
        } else if ($remaining_days <= 14) {
            return "warning";
        } else {
            return "success";
        }
    }

    public function getInventoryByUsernameForDashboard(mixed $username)
    {
        $stock = new Stock();
        $results = $stock->getStockForDashboard($username);

        if ($results) {
            return $results;
        } else {
            return false;
        }
    }

    public function medicineDetails(Request $request) {
        if ($_SESSION['userType'] == 'pharmacy') {
            if ($request -> isGet()) {

                $medicineID = $request -> getParams()['medicine-id'];
                $stock = (new Stock() )->getMedicineStock($medicineID, $_SESSION['username']);

                header('Content-Type: application/json');
                return json_encode($stock);


            } else if ($request -> isPost()) {
                return header('/pharmacy/inventory');
            } else {
                return header('/login');
            }
        } else {
            return header('/login');
        }
    }

    public function updateMedicine(Request $request) {

        if ($request->isPost()) {

            // I want to see the request body

            if ($request->getBody()['pharmacyName'] == $_SESSION['username']) {
                $stock = new Stock();

                $pharmacyName = $request->getBody()['pharmacyName'];
                $medicineID = $request->getBody()['medId'];
                $medName = $request->getBody()['medName'];
                $sciName = $request->getBody()['sciName'];
                $recievedDate = $request->getBody()['recievedDate'];
                $remQty = $request->getBody()['remQty'];
                $buyingPrice = $request->getBody()['buyingPrice'];
                $sellingPrice = $request->getBody()['sellingPrice'];
                $remainingDays = $request->getBody()['remainingDays'];
                $consumption = $request->getBody()['consumption'];

                $oldRemainigDays = $stock->getRemainingDaysByMedicineID($medicineID, $pharmacyName);
                $oldConsumption = $stock->getConsumptionByMedicineID($medicineID, $pharmacyName);

                $newRemainingDaysPerConsumption = (int)((int)($remainingDays) / (double)($consumption));

//                if ($oldConsumption != $consumption) {
//                    if ($oldRemainigDays != $remainingDays) {
//                        // remaining days has changed
//                        // consumption has changed
//                        // check if the new remaining days is less than $newRemainingDaysPerConsumption
//                        // if it is less, then update remaining days
//                        if ($remainingDays > $newRemainingDaysPerConsumption) {
//                            $remainingDays = $newRemainingDaysPerConsumption;
//                        }
//
//                    } else {
//                        // remaining days stays the same
//                        //  consumption has changed
//                        // check if the new remaining days is less than $newRemainingDaysPerConsumption
//                        // if it is less, then update remaining days
//                        if ($remainingDays > $newRemainingDaysPerConsumption) {
//                            $remainingDays = $newRemainingDaysPerConsumption;
//                        }
//
//                    }
//                } else {
//                    // new consumption is the same as the old consumption
//                    if ($oldRemainigDays != $remainingDays) {
//                        // remaining days has changed
//                        // consumption is the same
//                        // check if the new remaining days is less than $newRemainingDaysPerConsumption
//                        // if it is less, then update remaining days
//
//                        if ($remainingDays > $newRemainingDaysPerConsumption) {
//                            $remainingDays = $newRemainingDaysPerConsumption;
//                        }
//
//                    } else {
//                        // consumption and remaining days are the same
//                        // this means that neither consumption nor remaining days has changed
//                        // no need to update remaining days or consumption
//                    }
//                }

                $response = $stock->updateMedicine($pharmacyName, $medicineID, $medName, $sciName, $remQty, $buyingPrice, $sellingPrice, $remainingDays, $consumption, $recievedDate);

                Logger::logDebug("Update medicine response: " . $response);

                if ($response) {
                    http_response_code(200);
                    return header('Location: /pharmacy/inventory');
                } else {
                    http_response_code(500);
                    return header('Location: /pharmacy/inventory');
                }

            } else {
                return header('Location: /login');
            }
        } else {
            //send response code 405
            http_response_code(405);
            return header('Location: /pharmacy/inventory');
        }

    }
}
