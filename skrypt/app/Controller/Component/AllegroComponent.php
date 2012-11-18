<?php

App::uses('Component', 'Controller');
/**
 * @method doAddPackageInfoToPostBuyForm(string $session_id, long $transaction_id, ArrayOfPackageInfoStruct $package_info) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doAddPackageInfoToPostBuyForm</a>
 * @method doAddToBlackList(string $session_handle, ArrayOfUserBlackListStruct $users_black_list_array) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doAddToBlackList</a>
 * @method doAddToWatchList(string $session_id, ArrayOfItemsID $item_ids) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doAddToWatchList</a>
 * @method doBidItem(string $session_handle, long $bid_it_id, float $bid_user_price, long $bid_quantity, long $bid_buy_now, PharmacyRecipientDataStruct $pharmacy_recipient_data) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doBidItem</a>
 * @method doCancelRefundForms(string $session_handle, ArrayOfCancelRefundDataStruct $refund_cancel_data_arr) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doCancelRefundForms</a>
 * @method doCancelRefundWarnings(string $session_handle, ArrayOfCancelRefundWarningStruct $cancel_refund_warnings_data_arr) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doCancelRefundWarnings</a>
 * @method doChangeItemFields(string $session_id, long $item_id, ArrayOfFieldsValue $fields_to_modify, ArrayOfFieldsId $fields_to_remove, int $preview_only) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doChangeItemFields</a>
 * @method doCheckExternalKey(string $webapi_key, long $user_id, long $item_id, string $hash_key) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doCheckExternalKey</a>
 * @method doCheckItemDescription(string $session_id, string $description_content) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doCheckItemDescription</a>
 * @method doCreateItemTemplate(string $session_id, string $item_template_name, ArrayOfFieldsValue $item_template_fields) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doCreateItemTemplate</a>
 * @method doFeedback(string $session_handle, long $fe_item_id, int $fe_use_comment_template, int $fe_to_user_id, string $fe_comment, string $fe_comment_type, int $fe_op, ArrayOfSellRatingEstimationStruct $fe_rating) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doFeedback</a>
 * @method doFeedbackMany(string $session_handle, ArrayOfFeedbackManyStruct $feedbacks_list) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doFeedbackMany</a>
 * @method doFindProductByCode(string $session_handle, string $product_code) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doFindProductByCode</a>
 * @method doFindProductByName(string $session_handle, string $product_name, long $category_id) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doFindProductByName</a>
 * @method doFinishItem(string $session_handle, long $finish_item_id, int $finish_cancel_all_bids, string $finish_cancel_reason) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doFinishItem</a>
 * @method doGetAdminUserLicenceDate(string $admin_session_handle, string $user_lic_login) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetAdminUserLicenceDate</a>
 * @method doGetBidItem2(string $session_handle, long $item_id) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetBidItem2</a>
 * @method doGetBlackListUsers(string $session_handle) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetBlackListUsers</a>
 * @method doGetCategoryPath(string $session_id, int $category_id) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetCategoryPath</a>
 * @method doGetCountries(int $country_code, string $webapi_key) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetCountries</a>
 * @method doGetDeals(string $session_handle, long $item_id, int $buyer_id) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetDeals</a>
 * @method doGetFavouriteCategories(string $session_handle) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetFavouriteCategories</a>
 * @method doGetFavouriteSellers(string $session_handle) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetFavouriteSellers</a>
 * @method doGetFilledPostBuyForms(string $session_id, int $payment_type, int $user_role, long $filling_time_from, long $filling_time_to) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetFilledPostBuyForms</a>
 * @method doGetItemFields(string $session_id, long $item_id) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetItemFields</a>
 * @method doGetItemTemplates(string $session_id, ArrayOfTemplatesID $item_template_ids) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetItemTemplates</a>
 * @method doGetItemsImages(string $session_handle, ArrayOfItemGetImage $items_array, int $image_type) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetItemsImages</a>
 * @method doGetMessageToBuyer(string $session_id, long $item_id) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetMessageToBuyer</a>
 * @method doGetMyAddresses(string $session_id) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetMyAddresses</a>
 * @method doGetMyIncomingPayments(string $session_handle, int $buyer_id, long $item_id, long $trans_recv_date_from, long $trans_recv_date_to, int $trans_page_limit, int $trans_offset) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetMyIncomingPayments</a>
 * @method doGetMyIncomingPaymentsRefunds(string $session_handle, int $buyer_id, long $item_id, int $limit, int $offset) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetMyIncomingPaymentsRefunds</a>
 * @method doGetMyPayments(string $session_id, int $seller_id, long $item_id, long $payment_time_from, long $payment_time_to, int $page_size, int $page_number) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetMyPayments</a>
 * @method doGetMyPaymentsInfo(string $session_id) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetMyPaymentsInfo</a>
 * @method doGetMyPaymentsRefunds(string $session_handle, int $seller_id, long $item_id, int $limit, int $offset) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetMyPaymentsRefunds</a>
 * @method doGetMyPayouts(string $session_handle, long $trans_create_date_from, long $trans_create_date_to, int $trans_page_limit, int $trans_offset) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetMyPayouts</a>
 * @method doGetPaymentData(int $country_id, string $webapi_key) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetPaymentData</a>
 * @method doGetPaymentMethods(string $session_id) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetPaymentMethods</a>
 * @method doGetPostBuyData(string $session_handle, ArrayOfAuctionID $items_array) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetPostBuyData</a>
 * @method doGetPostBuyFormsDataForBuyers(string $session_id, ArrayOfTransactionsID $transactions_ids_array) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetPostBuyFormsDataForBuyers</a>
 * @method doGetPostBuyFormsDataForSellers(string $session_id, ArrayOfTransactionsID $transactions_ids_array) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetPostBuyFormsDataForSellers</a>
 * @method doGetProductCatalogueCategories(string $session_id) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetProductCatalogueCategories</a>
 * @method doGetProductCategories(string $session_id, long $product_id) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetProductCategories</a>
 * @method doGetRefundFormsStatuses(string $session_handle, ArrayOfRefundFormStatusStruct $refund_forms_statuses_data_arr) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetRefundFormsStatuses</a>
 * @method doGetRefundReasons(string $webapi_key, int $country_code) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetRefundReasons</a>
 * @method doGetRelatedItems(string $session_id, ArrayOfItemsID $item_ids) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetRelatedItems</a>
 * @method doGetSellFormFieldsForCategory(string $webapi_key, int $country_id, int $category_id) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetSellFormFieldsForCategory</a>
 * @method doGetSellRatingReasons(string $webapi_key, int $country_code) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetSellRatingReasons</a>
 * @method doGetServiceInfo(int $country_code, int $an_cat_id, long $an_it_date, int $an_it_id, string $webapi_key) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetServiceInfo</a>
 * @method doGetServiceInfoCategories(int $country_code, string $webapi_key) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetServiceInfoCategories</a>
 * @method doGetServiceTemplates(int $country_code, string $webapi_key) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetServiceTemplates</a>
 * @method doGetShipmentDataForRelatedItems(string $session_id, ArrayOfItemsID $item_ids) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetShipmentDataForRelatedItems</a>
 * @method doGetShopCatsData(string $session_handle) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetShopCatsData</a>
 * @method doGetSiteJournal(string $session_handle, long $starting_point, int $info_type) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetSiteJournal</a>
 * @method doGetSiteJournalDeals(string $session_id, long $journal_start) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetSiteJournalDeals</a>
 * @method doGetSiteJournalDealsInfo(string $session_id, long $journal_start) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetSiteJournalDealsInfo</a>
 * @method doGetSiteJournalInfo(string $session_handle, long $starting_point, int $info_type) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetSiteJournalInfo</a> Zwraca liczbe 'transakcji' oraz id ostatniej
 * @method doGetSpecialItems(string $session_handle, int $special_type, int $special_group, int $offset, int $order_fulfillment_time) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetSpecialItems</a>
 * @method doGetStatesInfo(int $country_code, string $webapi_key) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetStatesInfo</a>
 * @method doGetSystemTime(int $country_id, string $webapi_key) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetSystemTime</a>
 * @method doGetTransactionsIDs(string $session_handle, ArrayOfItemsID $items_id_array, string $user_role, ArrayOfShipmentIds $shipment_id_array) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetTransactionsIDs</a>
 * @method doGetUserID(int $country_id, string $user_login, string $user_email, string $webapi_key) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetUserID</a>
 * @method doGetUserLicenceDate(string $session_handle) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetUserLicenceDate</a>
 * @method doGetUserLogin(int $country_id, int $user_id, string $webapi_key) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetUserLogin</a>
 * @method doGetWaitingFeedbacks(string $session_handle, int $offset, int $package_size) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetWaitingFeedbacks</a>
 * @method doGetWaitingFeedbacksCount(string $session_handle) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doGetWaitingFeedbacksCount</a>
 * @method doInternalIStoreChange(string $webapi_key, long $user_id, long $istore_id, string $action_type, long $action_date, long $valid_date) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doInternalIStoreChange</a>
 * @method doInternalSendMessage(string $session_handle, int $user_id, int $mail_template_id, ArrayOfAdditionalData $array_of_additional_data) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doInternalSendMessage</a>
 * @method doMakeDiscount(string $session_handle, long $deal_id, float $discount_amount, float $discount_percentage) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doMakeDiscount</a>
 * @method doMakeDiscountByCoupon(string $session_id, DiscountDataStruct $discount_data) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doMakeDiscountByCoupon</a>
 * @method doMyAccount2(string $session_handle, string $account_type, int $offset, ArrayOfAuctionID $items_array, int $limit) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doMyAccount2</a>
 * @method doMyAccountItemsCount(string $session_handle, string $account_type, ArrayOfAuctionID $items_array) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doMyAccountItemsCount</a>
 * @method doMyBilling(string $session_handle) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doMyBilling</a>
 * @method doMyContact(string $session_handle, ArrayOfAuctionID $auction_id_list, int $offset, int $desc) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doMyContact</a>
 * @method doMyFeedback2(string $session_handle, string $feedback_type, int $offset, int $desc, ArrayOfAuctionID $items_array) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doMyFeedback2</a>
 * @method doMyFeedback2Limit(string $session_handle, string $feedback_type, int $offset, int $desc, ArrayOfAuctionID $items_array, int $package_element) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doMyFeedback2Limit</a>
 * @method doQueryAllSysStatus(int $country_id, string $webapi_key) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doQueryAllSysStatus</a>
 * @method doRemoveFromBlackList(string $session_handle, ArrayOfUsersID $users_id_array) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doRemoveFromBlackList</a>
 * @method doRemoveFromWatchList(string $session_handle, ArrayOfItemsID $items_id_array) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doRemoveFromWatchList</a>
 * @method doRemoveItemTemplates(string $session_id, ArrayOfTemplatesID $item_template_ids) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doRemoveItemTemplates</a>
 * @method doRequestCancelBid(string $session_handle, long $request_item_id, string $request_cancel_reason) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doRequestCancelBid</a>
 * @method doRequestPayout(string $session_id) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doRequestPayout</a>
 * @method doRequestSurcharge(string $session_handle, long $transaction_id, float $surcharge_value, string $surcharge_message_to_buyer) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doRequestSurcharge</a>
 * @method doSendPostBuyForm(string $session_id, ArrayOfNewPostBuyFormSellerStruct $new_post_buy_form_seller, NewPostBuyFormCommonStruct $new_post_buy_form_common) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doSendPostBuyForm</a>
 * @method doSendRefundForms(string $session_handle, ArrayOfSendRefundFormStruct $send_refund_forms_data_arr) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doSendRefundForms</a>
 * @method doSendReminderMessages(string $session_handle, ArrayOfSendReminderMessageStruct $send_reminder_messages_data_arr) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doSendReminderMessages</a>
 * @method doSetUserLicenceDate(string $admin_session_handle, string $user_lic_login, int $user_lic_country, float $user_lic_date) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doSetUserLicenceDate</a>
 * @method doTranslateProductID(string $session_id, long $bdk_product_id) <a href="http://allegro.pl/webapi/documentation.php/show/id,643">doTranslateProductID</a>


 * 
 * @link http://wppp.pl
 * @method doGetBlackListUsers()
 */
class AllegroComponent extends Component  {


    private $_login;
    private $_password;
    private $_api_key;
    private $_wsdl;
    private $_country;


    private $_client;
    private $_version;
    private $_session;

    private $vars;

    private $_file_name = '.allegro_webapi_session';

    public function __construct(){
        Configure::load('allegro');

        $this->_login = Configure::read('Allegro.login');
        $this->_password = Configure::read('Allegro.password');
        $this->_api_key = Configure::read('Allegro.api_key');
        $this->_wsdl = Configure::read('Allegro.wsdl');
        $this->_country = Configure::read('Allegro.country');

        //tworzymy klienta Soap
        $this->_client = new SoapClient($this->_wsdl);

        //wczytujemy sesje z pliku, majac nadzieje, ze jest jeszcze aktywna :)
        //jesli jest nieaktywna - odpytamy allegro o nia
        $this->_session['session-handle-part'] = @file_get_contents($this->_file_name);


    }

    /**
     * Pomocnicza, zamienia slowa kluczowe na ich wartosci,
     * np. 'login' na 'login_w_allegro'
     * @param $params
     * @return array
     */
    private function _replace_vars($params){

        //tablica z przepisanymi wartosciami
        $call_params  = array();

        foreach($params as $param){
            switch($param){

                case 'country-id': case 'country-code':case 'country':
                $call_params[] = $this->_country;
                break;

                case 'local-version':case 'ver-key': $call_params[] = $this->_version['ver-key'];
            break;

                case 'session-handle': case 'session-id': case 'session':
                $call_params[] = $this->_session['session-handle-part'];
                break;

                case 'user-login': case 'login': $call_params[] = $this->_login;
            break;

                case 'user-password': case 'password': $call_params[] = $this->_password;
            break;

                case 'webapi-key': case 'webapi': case 'api-key': $call_params[] = $this->_api_key;
            break;

                default: $call_params[] = $param;
                break;
            }
        }
        return $call_params;
    }

    /**
     * Przechwytuje metody, ktorymi odpytujemy Allegro
     *
     * $user_id = $this->allegro->doGetUserID('country-id', 'nick_do_sprawdzenia', 'niepuste_wymagane', 'webapi-key');

     * @param $name
     * @param $params
     * @return mixed
     * @throws Exception
     */
    public function __call($name, $params){

        $call_params = $this->_replace_vars($params);

        try{

//            print_r($name);
//            print_r($call_params);
//            die();
            $call = call_user_func_array(array($this->_client, $name), $call_params);
//            print_r($call);
            return $call;

        } catch (Exception $e){

            $code = $e->faultcode;
            if($code == 'ERR_NO_SESSION' OR $code == 'ERR_SESSION_EXPIRED' OR $code == 'ERR_INVALID_VERSION_CAT_SELL_FIELDS'){

                //to blad zw z sesja lub wersja lokalna - musimy zaktualizowac wartosci
                try{
                    $this->_version = $this->doQuerySysStatus(1,  'country-id' ,'webapi-key');
                    $this->_session = $this->doLogin('user-login', 'user-password', 'country-code', 'webapi-key', 'local-version');

                    //zapisz sesje na pozniej
                    $this->_file_name.' '. $this->_session['session-handle-part'];
                    file_put_contents($this->_file_name, $this->_session['session-handle-part']);

                    //wywolaj metode, ktorej sie wczesniej nie udalo
                    $call_params = $this->_replace_vars($params);

                    return  call_user_func_array(array($this->_client, $name), $call_params);

                } catch (SoapFault $e){
                    throw new Exception('Blad w sesji..');
                }
            } else{
                print_r($e->getMessage());
                throw new Exception($code);
            }
        }
    }
    public function getSiteJournal($last = null, $infoType = 0){
        
        
        $stop = false;

        $arr = array();
        while(!$stop){

            $data = $this->doGetSiteJournal('session',$last);


            $arr = array_merge($arr,$data);

            if(count($data) < 100){

                $stop = true;

            } else{

               $last = $data[99]->{'row-id'};
            }
        }
        return $arr;
    }

    public function fff($startingPoint = null, $infoType = 0 )
    {

        $stopCondition = false;
        $journal = array();
        while(!$stopCondition)
        {
// metoda doGetSiteJournal zwraca maksymalnie po 100 zdarzeń
            $journalPortion = $this->doGetSiteJournal('session', $startingPoint, $infoType);

            $journal = array_merge($journal, $journalPortion);

            $packageSize = count($journalPortion);

// paczka mniejsza niż 100, lub przekroczony maksymalny limit
            if ($packageSize < 100)
            {
                $stopCondition = true;
            }
            else
            {
                $startingPoint = $journalPortion[99]->{'row-id'};
            }
        }

        return $journal;
    }
}


