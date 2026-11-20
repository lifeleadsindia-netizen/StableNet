<?php

use App\Http\Controllers\ActivationController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FundController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\LevelsController;
use App\Http\Controllers\MemberDetailController;
use App\Http\Controllers\StakingController;
use App\Http\Controllers\SupportController;
use App\Http\Controllers\TempController;
use App\Http\Controllers\WithdrawalController;
use App\Http\Controllers\AiTradingController; // Added AiTradingController
use App\Http\Controllers\AutopoolController;
use Illuminate\Support\Facades\Route;
use App\Models\RewardIncome;
use App\Models\MemberDetail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [FrontendController::class, 'index']);
Route::get('gallery', [FrontendController::class, 'gallery']);
Route::get('/send-admin-otp', [AdminController::class, 'sendAdminOtp']);
Route::get('/admin', [AdminController::class, 'adminPage']);
Route::post('adminLogin', [AdminController::class, 'authenticate'])->name('adminLogin');

//forget password
Route::get('/forget-password', [AdminController::class, 'forgetPassword']);
Route::post('/retrivePassword', [AdminController::class, 'retrivePassword'])->name('retrivePassword');

Route::group(['prefix' => 'admin', 'middleware' => 'AdminAuth'], function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/profile', [AdminController::class, 'profile']);
    Route::get('/member-details', [AdminController::class, 'details']);
    Route::get('/logout', [AdminController::class, 'logout']);

    //member account control update
    Route::get('/account-control', [AdminController::class, 'accountControl']);
    Route::get('/account-control/{id}', [AdminController::class, 'statusChange']);
    //member security updates
    Route::get('/member-security', [AdminController::class, 'security']);
    Route::post('securityUpdate', [AdminController::class, 'securityUpdate'])->name('securityUpdate');
    ///member activation
    Route::get('/member-activation', [StakingController::class, 'mActivation']);
    Route::post('memActivation', [StakingController::class, 'memActivation'])->name('memActivation');
    //member details update
    Route::get('/members/member-update/{id}', [AdminController::class, 'memberUpdate']);
    Route::post('/updateDetails', [AdminController::class, 'updateDetails'])->name('updateDetails');
    Route::get('/free-pin-account', [AdminController::class, 'freePinAccount']);
    Route::post('/PinUserAccount', [AdminController::class, 'PinUserAccount'])->name('PinUserAccount');

    // dashboard message section
    Route::get('/dash-messages', [AdminController::class, 'dashMessages']);
    Route::get('/dash-messages/delete/{id}', [AdminController::class, 'dashMsgDelete']);

    Route::get('member-login/{id}', [AdminController::class, 'memberLogin']);
    Route::get('/logout', [AdminController::class, 'logout']);
    Route::get('/achievers-images', [AdminController::class, 'achiversImages']);
    Route::get('/achv-image/delete/{id}', [AdminController::class, 'achiversImagesDelete']);


    //wallet address update
    Route::get('/wallet-address', [AdminController::class, 'walletAddress']);
    Route::get('/new-withdrawal-request', [AdminController::class, 'withdrawals']);
    Route::get('/cancelled-request', [AdminController::class, 'cancelledRequest']);
    Route::get('/payment-history', [AdminController::class, 'paymentHistory']);
    // Route::get('/gateway-request', [AdminController::class, 'gatewayRequest']);

    Route::get('/withdrawal/accept-online/{id}', [AdminController::class, 'wAcceptOnline']);
    Route::get('/withdrawal-accept/{id}', [WithdrawalController::class, 'withdrawalaccept']);
    Route::post('/sendWdlRequest', [WithdrawalController::class, 'sendWdlRequest'])->name('sendWdlRequest');
    Route::get('/withdrawal/accept/{id}', [AdminController::class, 'wAccept']);
    Route::get('/withdrawal/cancel/{id}', [AdminController::class, 'wCancel']);
    Route::post('/withdrawalAccept', [AdminController::class, 'withdrawalAccept'])->name('withdrawalAccept');
    // Route::post('/withdrawalAcceptOnline', [WithdrawalController::class, 'withdrawalAcceptOnline'])->name('withdrawalAcceptOnline');

    Route::get('/package-details', [AdminController::class, 'packageDetails']);
    // Route::get('/new-withdrawal-request', [AdminController::class, 'withdrawals']);
    //Route::get('/p2p-fund-transfer', [AdminController::class, 'p2pFundTransfer']);
    // Route::get('/payment-history', [AdminController::class, 'paymentHistory']);

    // // staking routes
    Route::get('/staking-details', [AdminController::class, 'stakingDetails']);
    Route::get('/income/cashback-income', [AdminController::class, 'roiincomes']);

    // income routes
    Route::get('/income/level-income', [AdminController::class, 'levelIncomes']);
    Route::get('/income/level-incomes', [AdminController::class, 'levelIncomes']);
    Route::get('/income/direct-income', [AdminController::class, 'directIncomes']);
    Route::get('/income/direct-incomes', [AdminController::class, 'directIncomes']);
    Route::get('/income/global-autopool-income', [AdminController::class, 'globalAutoPoolIncomes']);
    Route::get('/income/global-autopool-incomes', [AdminController::class, 'globalAutoPoolIncomes']);
    Route::get('/income/withdrawal-income', [AdminController::class, 'withdrawalIncomes']);
    Route::get('/income/withdrawal-incomes', [AdminController::class, 'withdrawalIncomes']);
    Route::get('/income/reward-income', [AdminController::class, 'rewardIncomes']);
    Route::get('/income/reward-incomes', [AdminController::class, 'rewardIncomes']);
    Route::get('/income/trade-bonus-income', [AdminController::class, 'tradeBonusIncomes']);
    Route::get('/income/trade-profit-income', [AdminController::class, 'tradeProfitIncomes']);
    Route::get('/income/profit-income', [AdminController::class, 'profitIncomes']);
    Route::get('/income/royalty-income', [AdminController::class, 'royaltyIncomes']);
    // Route::get('/income/rank-incomes', [AdminController::class, 'rankIncomes']);
    // Route::get('/income/roi-level-income', [AdminController::class, 'dailyLevel']);
    // Route::get('/income/club-income', [AdminController::class, 'clubInc']);
    // Route::get('/income/total-monthly-inc', [AdminController::class, 'totalMonthlyInc']);

    //support ticket sections
    Route::get('/support/new-support-ticket', [SupportController::class, 'newSupport']);
    Route::get('/support/open-support-ticket', [SupportController::class, 'openSupport']);
    Route::get('/support/close-support-ticket', [SupportController::class, 'closeSupport']);
    Route::get('/support/view-support-ticket/{id}', [SupportController::class, 'viewSupport']);
    Route::get('/support/view-closed-ticket/{id}', [SupportController::class, 'viewClosed']);
    Route::get('/closed-ticket/{id}', [SupportController::class, 'closedTicket']);
    Route::post('/Ticket', [SupportController::class, 'Ticket'])->name('Ticket');

    //funds
    Route::get('/accept-request/{id}', [FundController::class, 'acceptReq']);
    Route::get('/reject-request/{id}', [FundController::class, 'rejectReq']);
    Route::get('/funds/add-funds', [AdminController::class, 'addFunds']);
    Route::post('addMemFunds', [AdminController::class, 'addMemFunds'])->name('addMemFunds');

    // deposit details
    Route::get('/deposit-details', [AdminController::class, 'depDetails']);
    Route::get('/deposit-status/{id}', [AdminController::class, 'depositStatus']);
    Route::post('/depositDataUSDT', [AdminController::class, 'depositDataUSDT'])->name('depositDataUSDT');
    Route::get('/data-table', [AdminController::class, 'dataTable']);

    Route::get('/daily-profits', [AdminController::class, 'dailyProfits']);
    Route::post('/dailyMemberProfits', [AdminController::class, 'dailyMemberProfits'])->name('dailyMemberProfits');

    Route::get('/funds/deduct-funds', [AdminController::class, 'deductFunds']);
    Route::post('deductMemFunds', [AdminController::class, 'deductMemFunds'])->name('deductMemFunds');
    Route::get('/funds/add-funds-details', [AdminController::class, 'addFundsDetails']);
    Route::get('/funds/request-history', [AdminController::class, 'fundsHistory']);
    Route::get('/funds/fund-requests', [AdminController::class, 'fundRequests']);
    Route::get('/funds/import-fund-history', [AdminController::class, 'requestsHistory']);
    Route::get('/accept-fundrequest/{id}', [FundController::class, 'acceptReq']);
    Route::get('/reject-fundrequest/{id}', [FundController::class, 'rejectReq']);

    //POST ROUTES
    Route::post('/dashMsg', [AdminController::class, 'dashMsg'])->name('dashMsg');
    Route::post('/changePassword', [AdminController::class, 'change'])->name('changePassword');
    Route::post('/changeEmail', [AdminController::class, 'changeEmail'])->name('changeEmail');
    Route::post('/updateWallet', [AdminController::class, 'updateWallet'])->name('updateWallet');
    Route::post('/acheivImage', [AdminController::class, 'acheivImage'])->name('acheivImage');

    //set rates
    Route::get('/rate/set-rates', [AdminController::class, 'setRates']);
    Route::post('/rateUpdate', [AdminController::class, 'rateUpdate'])->name('rateUpdate');

    //member-gallery
    Route::get('/member-gallery', [AdminController::class, 'memGallery']);
    Route::get('/member-gallery/status-change/{id}', [AdminController::class, 'memGalStatusChange']);
});

//   Member Routes
Route::get('/member/register/{id}', [MemberDetailController::class, 'register']);
Route::post('/addressValidate', [MemberDetailController::class, 'addressValidate'])->name('addressValidate');
Route::post('/userRegister', [MemberDetailController::class, 'userRegister'])->name('userRegister');
Route::get('/member/account-created', [MemberDetailController::class, 'accountCreated']);
Route::get('/member', [MemberDetailController::class, 'index']);
Route::post('/userLogin', [MemberDetailController::class, 'authenticate'])->name('userLogin');
// mft_member@123

Route::post('/getSponname', [MemberDetailController::class, 'getSponname']);
Route::post('/getUserid', [MemberDetailController::class, 'getUserid']);
Route::post('/getMember', [MemberDetailController::class, 'getMember']);
Route::get('/mem-forget-password', [MemberDetailController::class, 'memforgetPassword']);
Route::post('/memretrivePassword', [MemberDetailController::class, 'memretrivePassword'])->name('memretrivePassword');

Route::group(['prefix' => 'member', 'middleware' => 'MemberAuth'], function () {

    Route::get('/dashboard', [MemberDetailController::class, 'dashboard']);
    Route::get('/logout', [MemberDetailController::class, 'logout']);
    Route::get('/ai-trading', [AiTradingController::class, 'index']);

    Route::get('/profit-withdrawal/{id}', [WithdrawalController::class, 'profitWithdrawal']);

    Route::get('/claim-cashback-income/{memberid}', [StakingController::class, 'claimCashbackIncome']);

    Route::get('/new-registration', [MemberDetailController::class, 'createUser']);
    Route::post('/createNewUser', [MemberDetailController::class, 'createNewUser'])->name('createNewUser');

    // Profile Routes
    Route::get('/profile/user-summary', [MemberDetailController::class, 'userSummary']);
    Route::post('insertProfile', [MemberDetailController::class, 'insertPdata'])->name('insertProfile');
    Route::get('/profile/security', [MemberDetailController::class, 'security']);
    Route::post('emailChange', [MemberDetailController::class, 'emailChange'])->name('emailChange');
    Route::post('passChange', [MemberDetailController::class, 'passChange'])->name('passChange');
    Route::post('txnpassChange', [MemberDetailController::class, 'txnpassChange'])->name('txnpassChange');
    Route::get('/profile/wallet-address', [MemberDetailController::class, 'walletAddress']);
    Route::get('/send-wallet-address-otp', [MemberDetailController::class, 'sendWalletAddressOtp']);
    Route::post('insertWalletAddress', [MemberDetailController::class, 'insertWalletAddress'])->name('insertWalletAddress');

    //Activation Routes
    // Route::get('/account/account-activation', [ActivationController::class, 'accountActivation']);
    // Route::post('activateUser', [ActivationController::class, 'activateUser'])->name('activateUser');
    // Route::get('/account/upgrade-activation', [ActivationController::class, 'activationUpgrade']);
    // Route::post('upgradeUser', [ActivationController::class, 'upgradeUser'])->name('upgradeUser');
    // Route::get('/account/packages-details', [ActivationController::class, 'packageDetails']);
    // Route::get('/account/member-activation', [ActivationController::class, 'memberActivation']);
    // Route::post('memberActivate', [ActivationController::class, 'memberActivate'])->name('memberActivate');

    //Import Fund Section
    Route::get('/fund/deposit-fund', [FundController::class, 'depositFund']);
    Route::post('USDTFundReq', [FundController::class, 'USDTFundReq'])->name('USDTFundReq');
    Route::post('addFund', [FundController::class, 'addFund'])->name('addFund');
    Route::post('instantFunds', [FundController::class, 'instantFunds'])->name('instantFunds');
    Route::get('/payment-success/{orderid}', [FundController::class, 'paySuccess']);
    Route::get('/payment-cancel/{orderid}', [FundController::class, 'payCancel']);
    Route::get('/fund/deposit-fund-history', [FundController::class, 'depositFundHis']);


    //income
    Route::get('/income/global-autopool-incomes', [IncomeController::class, 'globalAutoPoolIncome']);
    Route::get('/income/global-autopool-income', [IncomeController::class, 'globalAutoPoolIncome']);
    Route::get('/income/direct-incomes', [IncomeController::class, 'directIncome']);
    Route::get('/income/direct-income', [IncomeController::class, 'directIncome']);
    Route::get('/income/level-incomes', [IncomeController::class, 'LevelIncomes']);
    Route::get('/income/level-income', [IncomeController::class, 'LevelIncomes']);
    Route::get('/income/withdrawal-incomes', [IncomeController::class, 'withdrawalIncomes']);
    Route::get('/income/withdrawal-income', [IncomeController::class, 'withdrawalIncomes']);
    Route::get('/income/income/withdrawal-incomes', [IncomeController::class, 'withdrawalIncomes']);

    // salary routes
    // Route::get('/income/salary-details', [IncomeController::class, 'salaryDetails']);
    // Route::get('/income/salary-incomes', [IncomeController::class, 'salaryIncomes']);
    //rewards routes
    Route::get('/income/reward-incomes', [IncomeController::class, 'rewardIncome']);
    Route::get('/income/reward-details', [IncomeController::class, 'rewardDetails']);

    //royality routes
    // Route::get('/royalty/royalty-incomes', [IncomeController::class, 'royaltyIncomes']);
    // Route::get('/royalty/royalty-details', [IncomeController::class, 'royaltyDetails']);

    // P2p Fund Transfer
    //   Route::get('/p2p-wallet', [FundController::class, 'activationWallet']);
    //   Route::post('fundTrans', [FundController::class, 'fundTrans'])->name('fundTrans');
    //   Route::get('/p2p-wallet-history', [FundController::class, 'activationWalletHistory']);

    // wallet Section
    Route::get('/wallet/main-wallet', [WithdrawalController::class, 'mainWallets']);
    Route::get('/wallet/sell-sbt', [WithdrawalController::class, 'mainWallets']);
    Route::post('initWithdrawal', [WithdrawalController::class, 'initWithdrawal'])->name('initWithdrawal');
    Route::get('/wallet/coin-wallet', [WithdrawalController::class, 'coinWallets']);
    Route::post('initCoinWithdrawal', [WithdrawalController::class, 'initCoinWithdrawal'])->name('initCoinWithdrawal');
    Route::get('/wallet/all-transaction', [WithdrawalController::class, 'walletTransfer']);
    Route::get('/wallet/withdrawal-history', [WithdrawalController::class, 'withdrlHistory']);

    // buy Coins / Investment Slots
    Route::get('/invest-slot', [StakingController::class, 'investSlot']);
    Route::post('createStaking', [StakingController::class, 'createStaking'])->name('createStaking');
    Route::get('/investment-details', [StakingController::class, 'investmentDetails']);
    Route::get('/buy-coin/buy-coin-details', [StakingController::class, 'investmentDetails']);
    Route::get('/trade/trade-details', [StakingController::class, 'tradeDetails']);
    Route::get('/trade/detailed-income/{tid}', [StakingController::class, 'detailedIncome']);

    //globalpool routes
    Route::get('/globalpool/globelpool-incomes', [AutopoolController::class, 'globelpoolIncome']);
    Route::get('/globalpool/globalpool-matrix/{id}', [AutopoolController::class, 'globalpoolMatrix']);
    Route::get('/globalpool/globalpool-members/{pool}/{value}', [AutopoolController::class, 'globelpoolMember']);

    //Direct and geneology
    Route::get('/team/geneology', [LevelsController::class, 'geneology']);
    Route::get('/team/view-geneology/{id}', [LevelsController::class, 'ViewGeneology']);
    Route::post('/searchGenelogy', [LevelsController::class, 'searchGenelogy'])->name('searchGenelogy');
    Route::get('/levels/direct-members', [LevelsController::class, 'directMembers']);
    Route::get('/levels/level-members-table', [LevelsController::class, 'lelMemTable']);
    Route::get('/levels/level-members-details/{levels}', [LevelsController::class, 'lelMemDetails']);

    //wallet to p2p transfer
    //   Route::get('/wallet/wallet-to-p2p', [FundController::class, 'walletToP2P']);
    //   Route::get('/wallet/wallet-to-p2p-history', [FundController::class, 'walletP2Phistory']);
    //   Route::post('walletP2pTransfer', [FundController::class, 'walletP2pTransfer'])->name('walletP2pTransfer');

    //member support section
    Route::get('/support/create-ticket', [SupportController::class, 'createTick']);
    Route::get('/support/support-tickets', [SupportController::class, 'supportTickets']);
    Route::get('/support/view-support-ticket/{tid}', [SupportController::class, 'ViewsupportTickets']);
    Route::post('/createTicket', [SupportController::class, 'createTicket'])->name('createTicket');
    Route::post('/MbReplyTicket', [SupportController::class, 'MbReplyTicket'])->name('MbReplyTicket');

    Route::post('balValidate', [WithdrawalController::class, 'balValidate'])->name('balValidate');
    Route::post('getPrivateKey', [WithdrawalController::class, 'getPrivateKey'])->name('getPrivateKey');
    Route::post('initiate-withdrawal', [WithdrawalController::class, 'withdrawal'])->name('initiate-withdrawal');

    //gallery
    Route::get('/gallery/member-gallery', [MemberDetailController::class, 'gallery']);
    Route::post('/galleryUpdate', [MemberDetailController::class, 'galleryUpdate'])->name('galleryUpdate');
});

Route::fallback(function () {
    return view('member.error404');
});

// Route::get('/temp', function(){
//      $sponsorid = 'RB610599';
//      $amount = 2000;
//      team_biz_update($sponsorid, $amount);
// });

// //Temp Routes
Route::get('/createTradingProfit', [TempController::class, 'createTradingProfit']);
Route::get('/releaseTradingProfit', [TempController::class, 'releaseTradingProfit']);
Route::get('/fakeIds/{sponsorid}/{ids}', [TempController::class, 'fakeIds']);
