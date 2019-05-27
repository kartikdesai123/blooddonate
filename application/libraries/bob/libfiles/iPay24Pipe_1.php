<?php
include ("parseResource.php");
include ("ipayTransactionPipe.php");
include ("Keystore.php");

// @author Digvijay Khojare 4/20/2017
class iPay24Pipe {
	protected $id = "";
	protected $action = "";
	protected $transId = "";
	protected $amt = "";
	protected $responseURL = "";
	protected $trackId = "";
	protected $udf1 = "";
	protected $udf2 = "";
	protected $udf3 = "";
	protected $udf4 = "";
	protected $udf5 = "";
	
	
	protected $udf6 = "";
	protected $udf7 = "";
	protected $udf8 = "";
	protected $udf9 = "";
	protected $udf10 = "";
	
	protected $udf11 = "";
	protected $udf12 = "";
	protected $udf13 = "";
	protected $udf14 = "";
	protected $udf15 = "";
	protected $udf16 = "";
	protected $udf17 = "";
	protected $udf18 = "";
	protected $udf19 = "";
	protected $udf20 = "";
	
	protected $udf21 = "";
	protected $udf22 = "";
	protected $udf23 = "";
	protected $udf24 = "";
	protected $udf25 = "";
	protected $udf26 = "";
	protected $udf27 = "";
	protected $udf28 = "";
	protected $udf29 = "";
	protected $udf30 = "";
	
	protected $udf31 = "";
	protected $udf32 = "";
	
	
	
	protected $paymentPage = "";
	protected $paymentId = "";
	protected $result = "";
	protected $auth = "";
	protected $ref = "";
	protected $avr = "";
	protected $date = "";
	protected $currency = "";
	protected $errorURL = "";
	protected $language = "";
	protected $error = "";
	protected $error_text = "";
	protected $rawResponse = "";
	protected $alias = "";
	protected $debugMsg = "";
	protected $responseCode = "";
	protected $zip = "";
	protected $addr = "";
	protected $member = "";
	protected $cvv2 = "";
	protected $cvv2Verification = "";
	protected $type = "";
	protected $card = "";
	protected $expDay = "";
	protected $expMonth = "";
	protected $expYear = "";
	protected $eci = "";
	protected $cavv = "";
	protected $xid = "";
	protected $resourcePath = "";
	protected $acsurl = "";
	protected $pareq = "";
	protected $pares = "";
	protected $error_service_tag = "";
	protected $keystorePath = "";
	protected $seperator = "\\";
	protected $sep = "/";
	protected $webAddress = "";
	protected $key = "";
	protected $initializationVector = "";
	protected $ivrFlag = "";
	protected $npc356chphoneidformat = "";
	protected $npc356chphoneid = "";
	protected $npc356shopchannel = "";
	protected $npc356availauthchannel = "";
	protected $npc356pareqchannel = "";
	protected $npc356itpcredential = "";
	protected $authDataName = "";
	protected $authDatastrlen = "";
	protected $authDataType = "";
	protected $authDataLabel = "";
	protected $authDataPrompt = "";
	protected $authDataEncryptKey = "";
	protected $authDataEncryptType = "";
	protected $authDataEncryptMandatory = "";
	protected $ivrPasswordStatus = "";
	protected $ivrPassword = "";
	protected $itpauthtran = "";
	protected $itpauthiden = "";
	protected $url = "";
	protected $savedcard = "";
	protected $paymentdebitId = "";
	protected $paymentUrl = "";
	protected $pmntmode = "";
	function getid() {
		return $this->id;
	}
	function getaction() {
		return $this->action;
	}
	function gettransId() {
		return $this->transId;
	}
	function getamt() {
		return $this->amt;
	}
	function getresponseURL() {
		return $this->responseURL;
	}
	function gettrackId() {
		return $this->trackId;
	}
	function getudf1() {
		return $this->udf1;
	}
	function getudf2() {
		return $this->udf2;
	}
	function getudf3() {
		return $this->udf3;
	}
	function getudf4() {
		return $this->udf4;
	}
	function getudf5() {
		return $this->udf5;
	}
	
	
	function getudf6() {
		return $this->udf6;
	}
	function getudf7() {
		return $this->udf7;
	}
	function getudf8() {
		return $this->udf8;
	}
	function getudf9() {
		return $this->udf9;
	}
	function getudf10() {
		return $this->udf10;
	}
	
	
	function getudf11() {
		return $this->udf11;
	}
	function getudf12() {
		return $this->udf12;
	}
	function getudf13() {
		return $this->udf13;
	}
	function getudf14() {
		return $this->udf14;
	}
	function getudf15() {
		return $this->udf15;
	}
	
	function getudf16() {
		return $this->udf16;
	}
	function getudf17() {
		return $this->udf17;
	}
	function getudf18() {
		return $this->udf18;
	}
	function getudf19() {
		return $this->udf19;
	}
	function getudf20() {
		return $this->udf20;
	}
	
	function getudf21() {
		return $this->udf21;
	}
	function getudf22() {
		return $this->udf22;
	}
	function getudf23() {
		return $this->udf23;
	}
	function getudf24() {
		return $this->udf24;
	}
	function getudf25() {
		return $this->udf25;
	}
	function getudf26() {
		return $this->udf26;
	}
	function getudf27() {
		return $this->udf27;
	}
	function getudf28() {
		return $this->udf28;
	}
	function getudf29() {
		return $this->udf29;
	}
	function getudf30() {
		return $this->udf30;
	}
	
	function getudf31() {
		return $this->udf31;
	}
	
	function getudf32() {
		return $this->udf32;
	}
	
	function getpaymentPage() {
		return $this->paymentPage;
	}
	function getpaymentId() {
		return $this->paymentId;
	}
	function getresult() {
		return $this->result;
	}
	function getauth() {
		return $this->auth;
	}
	function getref() {
		return $this->ref;
	}
	function getavr() {
		return $this->avr;
	}
	function getDates() {
		return $this->date;
	}
	function getcurrency() {
		return $this->currency;
	}
	function geterrorURL() {
		return $this->errorURL;
	}
	function getlanguage() {
		return $this->language;
	}
	function geterror() {
		return $this->error;
	}
	function geterror_text() {
		return $this->error_text;
	}
	function getrawResponse() {
		return $this->rawResponse;
	}
	function getalias() {
		return $this->alias;
	}
	function getDebugMsg() {
		return $this->debugMsg;
	}
	function getresponseCode() {
		return $this->responseCode;
	}
	function getzip() {
		return $this->zip;
	}
	function getaddr() {
		return $this->addr;
	}
	function getmember() {
		return $this->member;
	}
	function getcvv2() {
		return $this->cvv2;
	}
	function getcvv2Verification() {
		return $this->cvv2Verification;
	}
	function getTypes() {
		return $this->type;
	}
	function getcard() {
		return $this->card;
	}
	function getexpDay() {
		return $this->expDay;
	}
	function getexpMonth() {
		return $this->expMonth;
	}
	function getexpYear() {
		return $this->expYear;
	}
	function geteci() {
		return $this->eci;
	}
	function getcavv() {
		return $this->cavv;
	}
	function getxid() {
		return $this->xid;
	}
	function getresourcePath() {
		return $this->resourcePath;
	}
	function getacsurl() {
		return $this->acsurl;
	}
	function getpareq() {
		return $this->pareq;
	}
	function getpares() {
		return $this->pares;
	}
	function geterror_service_tag() {
		return $this->error_service_tag;
	}
	function getkeystorePath() {
		return $this->keystorePath;
	}
	function getseperator() {
		return $this->seperator;
	}
	function getsep() {
		return $this->sep;
	}
	function getwebAddress() {
		return $this->webAddress;
	}
	function getkey() {
		return $this->key;
	}
	function getinitializationVector() {
		return $this->initializationVector;
	}
	function getivrFlag() {
		return $this->ivrFlag;
	}
	function getnpc356chphoneidformat() {
		return $this->npc356availauthchannel;
	}
	function getnpc356chphoneid() {
		return $this->npc356chphoneid;
	}
	function getnpc356shopchannel() {
		return $this->npc356shopchannel;
	}
	function getnpc356availauthchannel() {
		return $this->npc356availauthchannel;
	}
	function getnpc356pareqchannel() {
		return $this->npc356itpcredential;
	}
	function getnpc356itpcredential() {
		return $this->npc356itpcredential;
	}
	function getauthDataName() {
		return $this->authDataName;
	}
	function getauthDatastrlen() {
		return $this->authDatastrlen;
	}
	function getauthDataType() {
		return $this->authDataType;
	}
	function getauthDataLabel() {
		return $this->authDataLabel;
	}
	function getauthDataPrompt() {
		return $this->authDataPrompt;
	}
	function getauthDataEncryptKey() {
		return $this->authDataEncryptKey;
	}
	function getauthDataEncryptType() {
		return $this->authDataEncryptType;
	}
	function getauthDataEncryptMandatory() {
		return $this->authDataEncryptMandatory;
	}
	function getivrPasswordStatus() {
		return $this->ivrPasswordStatus;
	}
	function getivrPassword() {
		return $this->ivrPassword;
	}
	function getitpauthtran() {
		return $this->itpauthtran;
	}
	function getitpauthiden() {
		return $this->itpauthiden;
	}
	function geturl() {
		return $this->url;
	}
	function getsavedcard() {
		return $this->savedcard;
	}
	function getpaymentdebitId() {
		return $this->paymentdebitId;
	}
	function getpaymentUrl() {
		return $this->paymentUrl;
	}
	function getpmntmode() {
		return $this->pmntmode;
	}
	// ############################################################################
	// SETTING DATA
	// ############################################################################
	function setid($val) {
		$this->id = $val;
	}
	function setaction($val) {
		$this->action = $val;
	}
	function settransId($val) {
		$this->transId = $val;
	}
	function setamt($val) {
		$this->amt = $val;
	}
	function setresponseURL($val) {
		$this->responseURL = $val;
	}
	function settrackId($val) {
		$this->trackId = $val;
	}
	function setudf1($val) {
		$this->udf1 = $val;
	}
	function setudf2($val) {
		$this->udf2 = $val;
	}
	function setudf3($val) {
		$this->udf3 = $val;
	}
	function setudf4($val) {
		$this->udf4 = $val;
	}
	function setudf5($val) {
		$this->udf5 = $val;
	}
	function setudf6($val) {
		$this->udf6 = $val;
	}
	function setudf7($val) {
		$this->udf7 = $val;
	}
	function setudf8($val) {
		$this->udf8 = $val;
	}
	function setudf9($val) {
		$this->udf9 = $val;
	}
	function setudf10($val) {
		$this->udf10 = $val;
	}
	function setudf11($val) {
		$this->udf11 = $val;
	}
	function setudf12($val) {
		$this->udf12 = $val;
	}
	function setudf13($val) {
		$this->udf13 = $val;
	}
	function setudf14($val) {
		$this->udf14 = $val;
	}
	function setudf15($val) {
		$this->udf15 = $val;
	}
	function setudf16($val) {
		$this->udf16 = $val;
	}
	function setudf17($val) {
		$this->udf17 = $val;
	}
	function setudf18($val) {
		$this->udf18 = $val;
	}
	function setudf19($val) {
		$this->udf19 = $val;
	}
	function setudf20($val) {
		$this->udf20 = $val;
	}
	function setudf21($val) {
		$this->udf21 = $val;
	}
	function setudf22($val) {
		$this->udf22 = $val;
	}
	function setudf23($val) {
		$this->udf23 = $val;
	}
	function setudf24($val) {
		$this->udf24 = $val;
	}
	function setudf25($val) {
		$this->udf25 = $val;
	}
	function setudf26($val) {
		$this->udf26 = $val;
	}
	function setudf27($val) {
		$this->udf27 = $val;
	}
	function setudf28($val) {
		$this->udf28 = $val;
	}
	function setudf29($val) {
		$this->udf29 = $val;
	}
	function setudf30($val) {
		$this->udf30 = $val;
	}
	function setudf31($val) {
		$this->udf31 = $val;
	}
	function setudf32($val) {
		$this->udf32 = $val;
	}
	
	
	
	
	
	function setpaymentPage($val) {
		$this->paymentPage = $val;
	}
	function setpaymentId($val) {
		$this->paymentId = $val;
	}
	function setresult($val) {
		$this->result = $val;
	}
	function setauth($val) {
		$this->auth = $val;
	}
	function setref($val) {
		$this->ref = $val;
	}
	function setavr($val) {
		$this->avr = $val;
	}
	function setDates($val) {
		$this->date = $val;
	}
	function setcurrency($val) {
		$this->currency = $val;
	}
	function seterrorURL($val) {
		$this->errorURL = $val;
	}
	function setlanguage($val) {
		$this->language = $val;
	}
	function seterror($val) {
		$this->error = $val;
	}
	function seterror_text($val) {
		$this->error_text = $val;
	}
	function setrawResponse($val) {
		$this->rawResponse = $val;
	}
	function setalias($val) {
		$this->alias = $val;
	}
	function setDebugMsg($val) {
		$this->debugMsg = $val;
	}
	function setresponseCode($val) {
		$this->responseCode = $val;
	}
	function setzip($val) {
		$this->zip = $val;
	}
	function setaddr($val) {
		$this->addr = $val;
	}
	function setmember($val) {
		$this->member = $val;
	}
	function setcvv2($val) {
		$this->cvv2 = $val;
	}
	function setcvv2Verification($val) {
		$this->cvv2Verification = $val;
	}
	function setTypes($val) {
		$this->type = $val;
	}
	
	function setcard($val) {
		$this->card = $val;
	}
	function setexpDay($val) {
		$this->expDay = $val;
	}
	function setexpMonth($val) {
		$this->expMonth = $val;
	}
	function setexpYear($val) {
		$this->expYear = $val;
	}
	function seteci($val) {
		$this->eci = $val;
	}
	function setcavv($val) {
		$this->cavv = $val;
	}
	function setxid($val) {
		$this->xid = $val;
	}
	function setresourcePath($val) {
		$this->resourcePath = $val;
	}
	function setacsurl($val) {
		$this->acsurl = $val;
	}
	function setpareq($val) {
		$this->pareq = $val;
	}
	function setpares($val) {
		$this->pares = $val;
	}
	function seterror_service_tag($val) {
		$this->error_service_tag = $val;
	}
	function setkeystorePath($val) {
		$this->keystorePath = $val;
	}
	function setseperator($val) {
		$this->seperator = $val;
	}
	function setsep($val) {
		$this->sep = $val;
	}
	function setwebAddress($val) {
		$this->webAddress = $val;
	}
	function setkey($val) {
		$this->key = $val;
	}
	function setinitializationVector($val) {
		$this->initializationVector = $val;
	}
	function setivrFlag($val) {
		$this->ivrFlag = $val;
	}
	function setnpc356chphoneidformat($val) {
		$this->npc356availauthchannel = $val;
	}
	function setnpc356chphoneid($val) {
		$this->npc356chphoneid = $val;
	}
	function setnpc356shopchannel($val) {
		$this->npc356shopchannel = $val;
	}
	function setnpc356availauthchannel($val) {
		$this->npc356availauthchannel = $val;
	}
	function setnpc356pareqchannel($val) {
		$this->npc356itpcredential = $val;
	}
	function setnpc356itpcredential($val) {
		$this->npc356itpcredential = $val;
	}
	function setauthDataName($val) {
		$this->authDataName = $val;
	}
	function setauthDatastrlen($val) {
		$this->authDatastrlen = $val;
	}
	function setauthDataType($val) {
		$this->authDataType = $val;
	}
	function setauthDataLabel($val) {
		$this->authDataLabel = $val;
	}
	function setauthDataPrompt($val) {
		$this->authDataPrompt = $val;
	}
	function setauthDataEncryptKey($val) {
		$this->authDataEncryptKey = $val;
	}
	function setauthDataEncryptType($val) {
		$this->authDataEncryptType = $val;
	}
	function setauthDataEncryptMandatory($val) {
		$this->authDataEncryptMandatory = $val;
	}
	function setivrPasswordStatus($val) {
		$this->ivrPasswordStatus = $val;
	}
	function setivrPassword($val) {
		$this->ivrPassword = $val;
	}
	function setitpauthtran($val) {
		$this->itpauthtran = $val;
	}
	function setitpauthiden($val) {
		$this->itpauthiden = $val;
	}
	function seturl($val) {
		$this->url = $val;
	}
	function setsavedcard($val) {
		$this->savedcard = $val;
	}
	function setpaymentdebitId($val) {
		$this->paymentdebitId = $val;
	}
	function setpaymentUrl($val) {
		$this->paymentUrl = $val;
	}
	function setpmntmode($val) {
		$this->pmntmode = $val;
	}
	// ##############################################################################################################################
	// ###################################################SETTER GETTER COMPLETED####################################################
	// ##############################################################################################################################
	
	// Builds host request
	function buildHostRequest() {
		$strRequest = "";
		try {
			
			if (strlen ( $this->amt ) > 0) {
				$strRequest .= "amt=" . $this->amt . "&";
			}
			if (strlen ( $this->action ) > 0) {
				$strRequest .= "action=" . $this->action . "&";
			}
			if (strlen ( $this->responseURL ) > 0) {
				$strRequest .= "responseURL=" . $this->responseURL . "&";
			}
			if (strlen ( $this->errorURL ) > 0) {
				$strRequest .= "errorURL=" . $this->errorURL . "&";
			}
			if (strlen ( $this->trackId ) > 0) {
				$strRequest .= "trackid=" . $this->trackId . "&";
			}
			if (strlen ( $this->udf1 ) > 0) {
				$strRequest .= "udf1=" . $this->udf1 . "&";
			}
			if (strlen ( $this->udf2 ) > 0) {
				$strRequest .= "udf2=" . $this->udf2 . "&";
			}
			if (strlen ( $this->udf3 ) > 0) {
				$strRequest .= "udf3=" . $this->udf3 . "&";
			}
			if (strlen ( $this->udf4 ) > 0) {
				$strRequest .= "udf4=" . $this->udf4 . "&";
			}
			if (strlen ( $this->udf5 ) > 0) {
				$strRequest .= "udf5=" . $this->udf5 . "&";
			}
			
			if (strlen ( $this->udf6 ) > 0) {
				$strRequest .= "udf6=" . $this->udf6 . "&";
			}
			
			if (strlen ( $this->udf7 ) > 0) {
				$strRequest .= "udf7=" . $this->udf7 . "&";
			}
			if (strlen ( $this->udf8 ) > 0) {
				$strRequest .= "udf8=" . $this->udf8 . "&";
			}
			
			if (strlen ( $this->udf9 ) > 0) {
				$strRequest .= "udf9=" . $this->udf9 . "&";
			}
			
			if (strlen ( $this->udf10 ) > 0) {
				$strRequest .= "udf10=" . $this->udf10 . "&";
			}
			
			if (strlen ( $this->udf11 ) > 0) {
				$strRequest .= "udf11=" . $this->udf11 . "&";
			}
			if (strlen ( $this->udf12 ) > 0) {
				$strRequest .= "udf12=" . $this->udf12 . "&";
			}
			if (strlen ( $this->udf13 ) > 0) {
				$strRequest .= "udf13=" . $this->udf13 . "&";
			}
			if (strlen ( $this->udf14 ) > 0) {
				$strRequest .= "udf14=" . $this->udf14 . "&";
			}
			if (strlen ( $this->udf15 ) > 0) {
				$strRequest .= "udf15=" . $this->udf15 . "&";
			}
			
			if (strlen ( $this->udf16 ) > 0) {
				$strRequest .= "udf16=" . $this->udf16 . "&";
			}
			
			if (strlen ( $this->udf17 ) > 0) {
				$strRequest .= "udf17=" . $this->udf17 . "&";
			}
			if (strlen ( $this->udf18 ) > 0) {
				$strRequest .= "udf18=" . $this->udf18 . "&";
			}
			
			if (strlen ( $this->udf19 ) > 0) {
				$strRequest .= "udf19=" . $this->udf19 . "&";
			}
			
			if (strlen ( $this->udf20 ) > 0) {
				$strRequest .= "udf20=" . $this->udf20 . "&";
			}
			
			if (strlen ( $this->udf21 ) > 0) {
				$strRequest .= "udf21=" . $this->udf21 . "&";
			}
			if (strlen ( $this->udf22 ) > 0) {
				$strRequest .= "udf22=" . $this->udf22 . "&";
			}
			if (strlen ( $this->udf23 ) > 0) {
				$strRequest .= "udf23=" . $this->udf23 . "&";
			}
			if (strlen ( $this->udf24 ) > 0) {
				$strRequest .= "udf24=" . $this->udf24 . "&";
			}
			if (strlen ( $this->udf25 ) > 0) {
				$strRequest .= "udf25=" . $this->udf25 . "&";
			}
			
			if (strlen ( $this->udf26 ) > 0) {
				$strRequest .= "udf26=" . $this->udf26 . "&";
			}
			
			if (strlen ( $this->udf27 ) > 0) {
				$strRequest .= "udf27=" . $this->udf27 . "&";
			}
			if (strlen ( $this->udf28 ) > 0) {
				$strRequest .= "udf28=" . $this->udf28 . "&";
			}
			
			if (strlen ( $this->udf29 ) > 0) {
				$strRequest .= "udf29=" . $this->udf29 . "&";
			}
			
			if (strlen ( $this->udf30 ) > 0) {
				$strRequest .= "udf30=" . $this->udf30 . "&";
			}
			
			if (strlen ( $this->udf31 ) > 0) {
				$strRequest .= "udf31=" . $this->udf31 . "&";
			}
			
			if (strlen ( $this->udf32 ) > 0) {
				$strRequest .= "udf32=" . $this->udf32 . "&";
			}
			
			if (strlen ( $this->currency ) > 0) {
				$strRequest .= "currencycode=" . $this->currency . "&";
			}
			if ($this->language != null && strlen ( $this->language ) > 0) {
				$strRequest .= "langid=" . $this->language . "&";
			}
			return $strRequest;
		} catch ( Exception $e ) {
			return null;
		}
		/*
		 * finally{
		 * $strRequest = null;
		 * }
		 */
	}
	function buildXMLRequest() {
		$requestbuffer = "";
		try {
			$requestbuffer .= "<request>";
			
			
			// // echo "<br/> pooh".$requestbuffer;
			if ($this->card != null)
				if (strlen ( $this->card ) > 0) {
					$requestbuffer .= "<card>".$this->card."</card>";
				}
			if ($this->cvv2 != null)
				if (strlen ( $this->cvv2 ) > 0) {
					$requestbuffer .= "<cvv2>" . $this->cvv2 . "</cvv2>";
				}
			if ($this->currency != null)
				if (strlen ( $this->currency ) > 0) {
					$requestbuffer .= "<currencycode>" . $this->currency . "</currencycode>";
				}
			if ($this->expYear != null)
				if (strlen ( $this->expYear ) > 0) {
					$requestbuffer .= "<expyear>" . $this->expYear . "</expyear>";
				}
			if ($this->expMonth != null)
				if (strlen ( $this->expMonth ) > 0) {
					$requestbuffer .= "<expmonth>" . $this->expMonth . "</expmonth>";
				}
			if ($this->expDay != null)
				if (strlen ( $this->expDay ) > 0) {
					$requestbuffer .= "<expday>" . "01" . "</expday>";
				}
			if ($this->type != null)
				if (strlen ( $this->type ) > 0) {
					$requestbuffer .= "<type>" . $this->type . "</type>";
				}
			if ($this->transId != null)
				if (strlen ( $this->transId ) > 0) {
					$requestbuffer .= "<transid>" . $this->transId . "</transid>";
				}
			if ($this->zip != null)
				if (strlen ( $this->zip ) > 0) {
					$requestbuffer .= "<zip>" . $this->zip . "</zip>";
				}
			if ($this->addr != null)
				if (strlen ( $this->addr ) > 0) {
					$requestbuffer .= "<addr>" . $this->addr . "</addr>";
				}
			if ($this->member != null)
				if (strlen ( $this->member ) > 0) {
					$requestbuffer .= "<member>" . $this->member . "</member>";
				}
			if ($this->amt != null)
				if (strlen ( $this->amt ) > 0) {
					$requestbuffer .= "<amt>" . $this->amt . "</amt>";
				}
			if ($this->action != null)
				if (strlen ( $this->action ) > 0) {
					$requestbuffer .= "<action>" . $this->action . "</action>";
				}
			if ($this->trackId != null)
				if (strlen ( $this->trackId ) > 0) {
					$requestbuffer .= "<trackid>" . $this->trackId . "</trackid>";
				}
			if ($this->udf1 != null)
				if (strlen ( $this->udf1 ) > 0) {
					$requestbuffer .= "<udf1>" . $this->udf1 . "</udf1>";
				}
			if ($this->udf2 != null)
				if (strlen ( $this->udf2 ) > 0) {
					$requestbuffer .= "<udf2>" . $this->udf2 . "</udf2>";
				}
			if ($this->udf3 != null)
				if (strlen ( $this->udf3 ) > 0) {
					$requestbuffer .= "<udf3>" . $this->udf3 . "</udf3>";
				}
			if ($this->udf4 != null)
				if (strlen ( $this->udf4 ) > 0) {
					$requestbuffer .= "<udf4>" . $this->udf4 . "</udf4>";
				}
			if ($this->udf5 != null)
				if (strlen ( $this->udf5 ) > 0) {
					$requestbuffer .= "<udf5>" . $this->udf5 . "</udf5>";
				}
				
				
			if ($this->udf6 != null)
				if (strlen ( $this->udf6 ) > 0) {
					$requestbuffer .= "<udf6>" . $this->udf6 . "</udf6>";
				}
			if ($this->udf7 != null)
				if (strlen ( $this->udf7 ) > 0) {
					$requestbuffer .= "<udf7>" . $this->udf7 . "</udf7>";
				}				
				
			if ($this->udf8 != null)
				if (strlen ( $this->udf8 ) > 0) {
					$requestbuffer .= "<udf8>" . $this->udf8 . "</udf8>";
				}
			
			if ($this->udf9 != null)
				if (strlen ( $this->udf9 ) > 0) {
					$requestbuffer .= "<udf9>" . $this->udf9 . "</udf9>";
				}
				
			if ($this->udf10 != null)
				if (strlen ( $this->udf10 ) > 0) {
					$requestbuffer .= "<udf10>" . $this->udf10 . "</udf10>";
				}
				
				
			if ($this->udf11 != null)
				if (strlen ( $this->udf11 ) > 0) {
					$requestbuffer .= "<udf11>" . $this->udf11 . "</udf11>";
				}
			if ($this->udf12 != null)
				if (strlen ( $this->udf12 ) > 0) {
					$requestbuffer .= "<udf12>" . $this->udf12 . "</udf12>";
				}
			if ($this->udf13 != null)
				if (strlen ( $this->udf13 ) > 0) {
					$requestbuffer .= "<udf13>" . $this->udf13 . "</udf13>";
				}
			if ($this->udf14 != null)
				if (strlen ( $this->udf14 ) > 0) {
					$requestbuffer .= "<udf14>" . $this->udf14 . "</udf14>";
				}
			if ($this->udf15 != null)
				if (strlen ( $this->udf15 ) > 0) {
					$requestbuffer .= "<udf15>" . $this->udf15 . "</udf15>";
				}
				
				
			if ($this->udf16 != null)
				if (strlen ( $this->udf16 ) > 0) {
					$requestbuffer .= "<udf16>" . $this->udf16 . "</udf16>";
				}
			if ($this->udf17 != null)
				if (strlen ( $this->udf17 ) > 0) {
					$requestbuffer .= "<udf17>" . $this->udf17 . "</udf17>";
				}				
				
			if ($this->udf18 != null)
				if (strlen ( $this->udf18 ) > 0) {
					$requestbuffer .= "<udf18>" . $this->udf18 . "</udf18>";
				}
			
			if ($this->udf19 != null)
				if (strlen ( $this->udf19 ) > 0) {
					$requestbuffer .= "<udf19>" . $this->udf19 . "</udf19>";
				}
				
			if ($this->udf20 != null)
				if (strlen ( $this->udf20 ) > 0) {
					$requestbuffer .= "<udf20>" . $this->udf20 . "</udf20>";
				}
				
			if ($this->udf21 != null)
				if (strlen ( $this->udf21 ) > 0) {
					$requestbuffer .= "<udf21>" . $this->udf21 . "</udf21>";
				}
			if ($this->udf22 != null)
				if (strlen ( $this->udf22 ) > 0) {
					$requestbuffer .= "<udf22>" . $this->udf22 . "</udf22>";
				}
			if ($this->udf23 != null)
				if (strlen ( $this->udf23 ) > 0) {
					$requestbuffer .= "<udf23>" . $this->udf23 . "</udf23>";
				}
			if ($this->udf24 != null)
				if (strlen ( $this->udf24 ) > 0) {
					$requestbuffer .= "<udf24>" . $this->udf24 . "</udf24>";
				}
			if ($this->udf25 != null)
				if (strlen ( $this->udf25 ) > 0) {
					$requestbuffer .= "<udf25>" . $this->udf25 . "</udf25>";
				}
				
				
			if ($this->udf26 != null)
				if (strlen ( $this->udf26 ) > 0) {
					$requestbuffer .= "<udf26>" . $this->udf26 . "</udf26>";
				}
			if ($this->udf27 != null)
				if (strlen ( $this->udf27 ) > 0) {
					$requestbuffer .= "<udf27>" . $this->udf27 . "</udf27>";
				}				
				
			if ($this->udf28 != null)
				if (strlen ( $this->udf28 ) > 0) {
					$requestbuffer .= "<udf28>" . $this->udf28 . "</udf28>";
				}
			
			if ($this->udf29 != null)
				if (strlen ( $this->udf29 ) > 0) {
					$requestbuffer .= "<udf29>" . $this->udf29 . "</udf29>";
				}
				
			if ($this->udf30 != null)
				if (strlen ( $this->udf30 ) > 0) {
					$requestbuffer .= "<udf30>" . $this->udf30 . "</udf30>";
				}
				
			if ($this->udf31 != null)
				if (strlen ( $this->udf31 ) > 0) {
					$requestbuffer .= "<udf31>" . $this->udf31 . "</udf31>";
				}
				
			if ($this->udf32 != null)
				if (strlen ( $this->udf32 ) > 0) {
					$requestbuffer .= "<udf32>" . $this->udf32 . "</udf32>";
				}	
				
				
				
				
				
		
			if ($this->eci != null)
				if (strlen ( $this->eci ) > 0) {
					$requestbuffer .= "<eci>" . $this->eci . "</eci>";
				}
			if ($this->errorURL != null)
				if (strlen ( $this->errorURL ) > 0) {
					$requestbuffer .= "<errorURL>" . $this->errorURL . "</errorURL>";
				}
			if ($this->responseURL != null)
				if (strlen ( $this->responseURL ) > 0) {
					$requestbuffer .= "<responseURL>" . $this->responseURL . "</responseURL>";
				}
			if ($this->ivrFlag != null)
				if (strlen ( $this->ivrFlag ) > 0) {
					$requestbuffer .= "<ivrFlag>" . $this->ivrFlag . "</ivrFlag>";
				}
			if ($this->npc356chphoneidformat != null)
				if (strlen ( $this->npc356chphoneidformat ) > 0) {
					$requestbuffer .= "<npc356chphoneidformat>" . $this->npc356chphoneidformat . "</npc356chphoneidformat>";
				}
			if ($this->npc356chphoneid != null)
				if (strlen ( $this->npc356chphoneid ) > 0) {
					$requestbuffer .= "<npc356chphoneid>" . $this->npc356chphoneid . "</npc356chphoneid>";
				}
			if ($this->npc356shopchannel != null)
				if (strlen ( $this->npc356shopchannel ) > 0) {
					$requestbuffer .= "<npc356shopchannel>" . $this->npc356shopchannel . "</npc356shopchannel>";
				}
			if ($this->npc356availauthchannel != null)
				if (strlen ( $this->npc356availauthchannel ) > 0) {
					$requestbuffer .= "<npc356availauthchannel>" . $this->npc356availauthchannel . "</npc356availauthchannel>";
				}
			if ($this->npc356pareqchannel != null)
				if (strlen ( $this->npc356pareqchannel ) > 0) {
					$requestbuffer .= "<npc356pareqchannel>" . $this->npc356pareqchannel . "</npc356pareqchannel>";
				}
			if ($this->npc356itpcredential != null)
				if (strlen ( $this->npc356itpcredential ) > 0) {
					$requestbuffer .= "<npc356itpcredential>" . $this->npc356itpcredential . "</npc356itpcredential>";
				}
			if ($this->ivrPasswordStatus != null && $this->ivrPasswordStatus . strlen () > 0)
				$requestbuffer .= "<ivrPasswordStatus>" . $this->ivrPasswordStatus . "</ivrPasswordStatus>";
			if ($this->ivrPassword != null && strlen ( $this->ivrPassword ) > 0) {
				$requestbuffer .= "<ivrPassword>" . $ivrPassword . "</ivrPassword>";
			}
			if ($this->savedcard != null) {
				$requestbuffer .= "<savedcard>" . $savedcard . "</savedcard>";
			}
			//return htmlspecialchars ( $requestbuffer ); // htmlspecialchars() to replace < > with lt and gt
			return $requestbuffer; // htmlspecialchars() to replace < > with lt and gt
		} catch ( Exception $e ) {
			return null;
		}
	}
	function performPaymentInitialization() {
		/*
		 * $str = "amt=100.00&action=1&responseURL=http://10.44.71.98:8080/JSPPlugin/jsp/resultPage/"."hostedTcpip/HostedPaymentResult.jsp&"."errorURL".
		 * "=http://10.44.71.98:8080/JSPPlugin/jsp/resultPage/hostedTcpip/HostedPaymentResult.jsp&trackid=1160788144&udf".
		 * "1=user defined field 1&udf2=user defined field 2&udf3=user defined field 4&udf4=user defined field 3&udf5=user" ."defined field5&currencycode=356&langid=USA&id=tranp2092&"
		 */
		;
		$request = "";
		$response = "";
		$requestbuffer;
		$xmlData = "";
		$hm;
		try {
			if ($request != null) {
				$xmlData = $data;
			} else {
				$keyParser = new KeyStore ();
				$this->key = $keyParser->parseKeyStore ( $this->keystorePath );
				$xmlData = $this->parseResource ( $this->key, $this->resourcePath, $this->alias );
			}
			var_dump ( $xmlData );
			
			if ($xmlData != null) {
				$hm = $this->parseXMLRequest ( $xmlData );
			} else {
				$error = "Alias name does not exits";
			}
			var_dump ( $hm );
			$this->key = $hm ['resourceKey'];
			// echo $this->key;
			$requestbuffer = $this->buildHostRequest ();
			$requestbuffer .= "id=" . $hm ["id"] . "&";
			
			$requestbuffer .= 'password=' . $hm ['password'] . "&";
			$webaddr = $hm ['webaddress'];
			// echo "<br><br><br><br>" . $requestbuffer . "<br><br><br>";
			$request = $requestbuffer;
			var_dump ( $request );
			// var_dump($request);
			// var_dump($webaddr);
			$pipe = new ipayTransactionPipe ();
			// echo "<br/>REQUEST" . $request;
			
			$response = $pipe->performHostedTransaction ( $request, $webaddr );
			VAR_DUMP ( $response );
			// System.out.println("response:::::::" + response);
			if ($response == null) {
				// echo "null";
				$this->error = "Error while connecting " . $response;
				return - 1;
			} else {
				if ($response != null) {
					// echo "not null";
					$this->setpaymentId ( $response [0] );
					$this->setpaymentPage ( $response [1] );
					// $this->paymentPage = $response[1];
					return 0;
				} else {
					$this->error = "Error while connecting " + $response;
					return - 1;
				}
			}
		} catch ( Exception $e ) {
			
			$this->error = "Error while connecting " + $response;
			return - 1;
		}
	}
	
	
	function performPaymentInitializationHTTP() {
		$request = null;
		$requestbuffer = null;
		$xmlData = null;
		try {
			$keyParser = new KeyStore ();
			$this->key = $keyParser->parseKeyStore ( $this->keystorePath );
			$xmlData = $this->parseResource ( $this->key, $this->resourcePath, $this->alias );
			if ($xmlData != null) {
				$xmlData = $this->parseXMLRequest ( $xmlData );
			} else {
				$error = "Alias name does not exits";
			}
			$this->key = $xmlData ['resourceKey'];
			$this->setId ( $xmlData ['id'] );
			$requestbuffer = $this->buildHostRequest ();
			$requestbuffer .= "id=" . $xmlData ['id'] . "&password=" . $xmlData ['password'] . "&";
			$this->webAddress = $xmlData ['webaddress'];
			$cipheredText = $this->encryptData ( $requestbuffer, $this->key );
			$request .= "&trandata=" . $cipheredText;
			$request .= "&errorURL=" . $this->errorURL . "&responseURL=" . $this->responseURL . "&tranportalId=" . $xmlData ['id'];
			$this->webAddress .= "/PaymentHTTP.htm?param=paymentInit" . $request;
		} catch ( Exception $e ) {
			$this->error = "Problem while encrypting request data";
			return - 1;
		} 
		return 0;
	}
	function sendMessage($request, $webAddress, $tranType) {
		$contentType = "";
		/*
		 * if(strpos($webAddress,("https") )!= -1)
		 * System.setProperty("java.protocol.handler.pkgs", "com.sun.net.ssl.internal.www.protocol");
		 *
		 */
		
		if (strcmp ( $tranType, "host" ))
			$contentType = "Content-Type:application/x-www-form-urlencoded";
		
		if (strcmp ( $tranType, "tran" ))
			$contentType = "Content-Type:application/xml";
		
		if (strlen ( $webAddress ) <= 0) {
			return null;
		}
		$curl = curl_init ();
		
		if (strlen ( $request ) > 0) {
			curl_setopt ( $curl, CURLOPT_URL, $webAddress );
			curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt ( $curl, CURLOPT_FRESH_CONNECT, TRUE );
			curl_setopt ( $curl, CURLOPT_SSL_VERIFYPEER, true );
			;
			curl_setopt ( $curl, CURLOPT_HTTPHEADER, array (
					'Cache-Control: no-cache',
					$contentType 
			) ); // setting content type header
			curl_setopt ( $curl, CURLOPT_POSTFIELDS, $request ); // Setting raw post data as xml
			$header_size = curl_getinfo ( $curl, CURLINFO_HEADER_SIZE );
			// echo "<CURL>" . $header_size;
			$result = curl_exec ( $curl );
			
			// // echo "<BR/> result".$result;
			// $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
			// // echo $http_code;
			if ($result == false) {
				// echo '<br/>Curl error: ' . curl_error ( $curl );
			}
			curl_close ( $curl );
		}
	}

	function performTransactionHTTP() {
		$request = null;
		$requestbuffer = null;
		$xmlData = null;
		try {
			
		//	$pipe = new KeyStore ();
			// echo "<br/>REQUEST" . $request;
			
		//	$response = $pipe->doSimleEncrypt ( '222222222222222222222222', 'C:/wamp/www/cgn/' );
		//	echo $response;
		//	die();
			$requestbuffer = $this->buildXMLRequest ();
			$obj=new KeyStore();
			
			//echo $this->keystorePath;
			//die();
			
			$this->key = $obj->parseKeyStore($this->keystorePath);


		    $xmlData = $this->parseResource ( $this->key, $this->resourcePath, $this->alias );
			
			
            if ($xmlData == null) {
				$this->error = "Alias name does not exits";
				return - 1;
			} else {
				$xmlData = $this->parseXMLRequest ( $xmlData );
			}
			$requestbuffer .= "<id>" . $xmlData ['id'] . "</id>";
			$requestbuffer .= "<password>" . $xmlData ['password'] . "</password>";
			$requestbuffer .= "</request>";
			if ($this->responseURL == null || strlen ( trim ( $this->responseURL ) ) <= 0) {
				$this->error = "Response URL is Invalid or NULL";
				return - 1;
			}
			$this->key = $xmlData ['resourceKey'];
			// echo "Resource key is ====" . $this->key;
			
			
			
			$cipheredText = $this->encryptData ( $requestbuffer, $this->key );
			
			
			
			
		//	echo $cipheredText;
			
			
		//	$cipheredTextsss = $this->decryptData( "da193db723bdf131cd1551509fbf2f28ca2cb2847724238cb9529f61777cd6faa12e60b258d6b7ca9058062fc6d4db46b8d3b6b41559c2d6ca8aa28159309ba00fda25108f7671a713edbe0bdc6825116a260b1538bf778d5adf8b11dd665a54dd5e5bec10806cd06a260b1538bf778d595105f2e4fb4748470aa340949f590c0deac29634d9f25c63228c5373f228f475eb1149ea148428cff2294f397325f412dc7258e31709b707b4a4e118bc1a8277976cb69750ab99c378e50355a1f43c712689cf45185c590f223354688cddef999b27eb577c113be99e2578be464659581b9851e3394e033e3932c6a135f6879781a081ceb4975a584dfdcd186879ef7803173d97635b77584dfdcd186879ef4f51dbdda3b92de2598253b3c81a1daf49abf402b4df22c04b1904d42efb4e15ec36c0a03285d04effa819cb7c97fd1bce5efb32c060faec653b88d040d1176fe80c1163b91cd28c9a6b8c2d55f9f1253822eb53c36c3476e38cbf99fe105af8b656e4cc3d818d57d6e3f161f7e09557f668b84678e91e022bf029ec3a505b8e393589146750a91d3001fdb7e4731182f859b8618e08b8594504b5c0ed726a7672e40ef3856a7ab5d095d3399b83746733ff3544c95264ff710a48ade73d0965400af1865e49e8935b07d498f544a90643962689cb1664e343319ebc1746811a3ba862547d1a58eaaa80e9ea4cd67d5800aa5b8b9c32c531d587e24b2a0e0828e07cad2e62478e009dd1ba2324bda6167f49f5a302ca5c59d300b7dcb3055fb399ac98b7c7c2c7b37f49f5a302ca5c59316cd23da11c3940b56c96b443f6d9f09f75a4f6d7bfb8f69a99f59e3b6ef178b03ee741b6c9268ea5dca2a77c23615c73447bc31eec000a546a1a2f52fe969c25a5bba71085a3b3758f15d245d27c20f19d0522b27f19ce88f05214d29ea3113d20178624617f8af87e25dc02770282b3c99f00b3b1448673d238b3034d96de07743625f78f3986bd5b8fbcaba47e864fe724566be6b9816957d9a816770af528073ebbedf1cb6146744ddbd2368c4249dd8557afa4b7b622e5cd622f54ef1151ecca469961966480617975bb29e99a9df96cf65b2dc6bc5f9798e5aae4077a6e9190bf5818bd6a9677030f41531d3440b399e338c938c8a53fc22f93521d7f", $this->key );
			
			//echo $this->key;
			//die();
			
			
			// // echo "<br/> ENCRYPTD URL TEXT ---> " . ($cipheredText) . "<br/>";
			$request .= "&trandata=" . $cipheredText;
			$request .= "&errorURL=" . $this->errorURL;
			$request .= "&responseURL=" . $this->responseURL;
			$request .= "&tranportalId=" . $xmlData ['id'];
			// echo "HERE I AM IN performTransactionHTTP   and encrypted URL IS  " . $request;
			$this->webAddress = $xmlData ['webaddress'];
			$this->setid ( $xmlData ['id'] . "" );
			$this->webAddress .= "/tranPipeHTTP.htm?param=tranInit" . $request;
			
			
		
			return 0;
		} catch ( Exception $e ) {
			// echo $e->getTraceAsString ();
			// echo "<BR/>" . $e->getMessage ();
			// $e.printStackTrace();
			$this->error = "Error :(";
			return - 1;
		}
	}
	// HINATA POOH CHANGE HERE
	function parseResource($key, $resourcePath, $alias) {
		$xmlData = null;
		$key = null;
		
		try {
		
			$parseResouce = new parseResource ();
			// $key = $parseResouce->loadKeyStore ( $keystorePath );
			// echo "<br/>key from keystore is---->" . $this->key;
			$parseResouce->setResourcePath ( $resourcePath );
			$parseResouce->setKey ( $this->key );
			$parseResouce->setAlias ( $alias );
			$parseResouce->createCGZFromCGN ();
			$xmlData = $parseResouce->readZip ();
			// // echo "here in parseResource".var_dump($xmlData);
		
			return $xmlData;
		} catch ( Exception $e ) {
			// echo $e->getTraceAsString ();
			
			// e.printStackTrace();
			return null;
		}
	}
	function performTransaction() {
		$xmlData = null;
		
		$requestbuffer = "";
		// HashMap hm = null;
		$response = "";
		$webaddr = "";
		$resultMap = null;
		try {
			$keyParser = new KeyStore ();
			$this->key = $keyParser->parseKeyStore ( $this->keystorePath );
			$xmlData = $this->parseResource ( $this->key, $this->resourcePath, $this->alias );
			// hm = new HashMap();
			if ($xmlData == null) {
				$this->error = "Alias name does not exits";
				return - 1;
			} else {
				$xmlData = $this->parseXMLrequest ( $xmlData );
			}
			
		
			$requestbuffer = $this->buildXMLRequest ();
			$requestbuffer .= "<id>" . $xmlData ['id'] . "</id>";
			$this->setid ( $xmlData ['id'] );
			$requestbuffer .= "<password>" . $xmlData ['password'] . "</password>";
			$webaddr = $xmlData ['webaddress'];
			$requestbuffer .= "</request>";
			
			
			
			if ($this->getaction () != null && strlen ( trim ( $this->getaction () ) ) < 1 && (strcasecmp ( "1", trim ( $this->getaction () ) ) || strcasecmp ( "4", trim ( $this->getaction ) ))) {
				$this->error = "Invalid action";
				return - 1;
			}
			$pipe = new ipayTransactionPipe ();

			$response = $pipe->performTranPortalTransaction ( $requestbuffer, $webaddr );
		
			
			if ($response == null || strlen ( $response ) <= 0) {
				$this->error = "Invalid response";
				return - 1;
			}
			
			 
			 $resultMap = $this->parseResponse ( $response );
			 
			return $this->setTransactionData ( $resultMap );
		} catch ( Exception $e ) 

		{
			// echo $e->getTraceAsString ();
			// // echo "<br/>".$e->getMessage();
			$this->error = "Error while processing $request! " + $e->getMessage ();
			return - 1;
		} /*
		   * finally{
		   * xmlData = null;
		   * $requestbuffer= null;
		   * hm= null;
		   * webaddr= null;
		   * }
		   */
	}
	function performTranPortalTransaction($request, $webAddress) {
		$webAddress .= "/tranPipe.htm?param=tranInit";
		$tranType = "tran";
		
		$response = $this->sendMessage ( $request, $this->webAddress, $tranType );
		
		
		return $response;
	}
	function parseEncryptedResultHttp($response) {
		$xmlData = null;
		
		try {
			$keyParser = new KeyStore ();
			$this->key = $keyParser->parseKeyStore ( $this->keystorePath );
			$xmlData = $this->parseResource ( $this->key, $this->resourcePath, $this->alias );
			if ($xmlData != null) {
				$hm = parseXMLRequest ( $xmlData );
			} else {
				$this->error = "Alias name does not exits";
			}
			$this->key = $hm ['resourceKey'];
			$cipheredText = $this->decryptData ( $response, $this->key );
			// ds = new AESAlgorithm().decryptText(key,$response);
			if ($cipheredText == null) {
				$this->error = "Invalid response";
				return - 1;
			}
			return parsetrandata ( $cipheredText );
		} catch ( Exception $e ) {
			$this->error = "Internal Error: " + $e->getMessage ();
			return - 1;
		}
	}
	function performVbVTransaction() {
		$request = null;
		$xmlData = null;
		$requestbuffer = null;
		$hm = null;
		try {
			$keyParser = new KeyStore ();
			$this->key = $keyParser->parseKeyStore ( $this->keystorePath );
			$requestbuffer = $this->buildXMLRequest ();
			$xmlData = $this->parseResource ( $this->key, $this->resourcePath, $this->alias );
			if ($xmlData == null) {
				$this->error = "Alias name does not exits";
				return - 1;
			} else {
				$hm = $this->parseXMLRequest ( $xmlData );
			}
			$requestbuffer .= "<id>" . $hm ['id'] . "</id>";
			$requestbuffer .= "<password>" . $hm ['password'] . "</password>";
			$requestbuffer .= "</request>";		
			
			// $this->responseURL = " ";
			if ($this->responseURL == null || strlen ( trim ( $this->responseURL ) ) == 0) {
				// echo $this->error = "Response URL is Invalid or NULL";
				return - 1;
			}
			$this->key = $hm ['resourceKey'];
			
			$cipheredText = $this->encryptData ( $requestbuffer, $this->key );
			
			$request = "&trandata=" . $cipheredText . "&errorURL=" . $this->errorURL . "&responseURL=" . $this->responseURL . "&tranportalId=" . $hm ['id'];
			
			$this->webAddress = $hm ['webaddress'];
			$this->webAddress .= "/VPAS.htm?actionVPAS=VbvVEReqProcessHTTP" . $request;
			// echo "<br/> WEBADDRESS -->" . $this->webAddress;
			
			return 0;
		} catch ( Exception $e ) {
			// echo $e->getTraceAsString ();
			// e.printStackTrace();
			$this->error = "Error! " . $e->getMessage ();
			return - 1;
		} /*
		   * finally {
		   * request= null;
		   * xmlData = null;
		   * requestbuffer= null;
		   * hm= null;
		   * }
		   */
	}
	function parseEncryptedRequest($trandata) {
		$result = 0;
		$xmlData = null;
		$hm = null;
		// $cipher = new Crypt_AES ( CRYPT_AES_MODE_ECB );
		
		try {
			
			if ($trandata == null) {
				return 0;
			}
			
			$keyParser = new KeyStore ();
			$this->key = $keyParser->parseKeyStore ( $this->keystorePath );
			 $xmlData = $this->parseResource($this->key, $this->resourcePath, $this->alias);
			
			
			if ($xmlData != null) {
				$hm = $this->parseXMLRequest ( $xmlData );
			} else {
				$this->error = "Alias name does not exits";
			}
			$this->key = $hm ['resourceKey'];
			// $cipher->setKey ( $this->key );
			$trandata = $this->decryptData ( $trandata, $this->key );
		//	$trandata = $this->decryptDataNew ( $trandata, '712121583726712121583728' );
		
			//echo $trandata;
			//die();
			$result = $this->parsetrandata ( $trandata );
			return $result;
		} catch ( Exception $e ) {
			// echo $e->getTraceAsString ();
			
			// e.printStackTrace();
			return - 1;
		}
	}
	function parseEncryptedResult($response) {
		$xmlData = null;
		$hm = null;
		$resultMap = null;
		// $cipher = new Crypt_AES ( CRYPT_AES_MODE_ECB );
		try {
			$keyParser = new KeyStore ();
			$this->key = $keyParser->parseKeyStore ( $this->keystorePath );
			 $xmlData = $this->parseResource($this->key, $this->resourcePath, $this->alias);
			 
			if ($xmlData != null) {
				$hm = $this->parseXMLRequest ( $xmlData );
			} else {
				$this->error = "Alias name does not exits";
			}
			$this->key = $hm ['resourceKey'];
			
			$response = $this->decryptData ( $response, $this->key );
			$resultMap = $this->parseResponse ( $response );
			return $this->setTransactionData ( $resultMap );
		} catch ( Exception $e ) {
			// echo $e->getTraceAsString ();
			// e.printStackTrace();
			$this->error = "Internal Error: " + e . getMessage ();
			return - 1;
		}
	}
	function parseXMLRequest($request) {
		try {
			
			// // echo "here".$request;
			$responseMap = null;
			$request = trim ( $request );
			$request = substr ( $request, strpos ( $request, "<id>" ), strlen ( $request ) - strpos ( $request, "<id>" ) );
			
			
			$request = str_replace ( "</terminal>", "", $request );
			// // echo var_dump ( $request );
			
			$pos = strpos ( $request, "<" ) == 0;
			// // echo var_dump($request);
			if ($request == null || (strlen ( $request ) < 0) || $pos === false) {
				return null;
			} else {
				try {
				//	var_dump ( $request );
					$responseMap = $this->parseResponse ( $request );
				} catch ( Exception $ex ) {
					// echo $e->getTraceAsString ();
					// $ex.printStackTrace();
				}
			}
			return $responseMap;
		} catch ( Exception $e ) {
			// echo $e->getTraceAsString ();
			// e.printStackTrace();
			return null;
		}
	}
	function parseResponse($response) {
		// HashMap responseMap = null;
		$begin = 0;
		$end = 0;
		$start = null;
		$value = null;
		$map;
		// responseMap = new HashMap();
		$response = trim ( $response );
		$pos = strpos ( $response, "<" ) == 0;
		if ($response == null || (strlen ( $response ) < 0) || $pos === false) {
			// // echo "returned";
			return null;
		} else {
			// // echo "else ";
			do {
				
				if ((strpos ( $response, '<' ) !== false) && (strpos ( $response, '>' ) !== false)) {
					$start = substr ( $response, ($ind = strpos ( $response, "<" )) + 1, ((strpos ( $response, ">" ) - 1) - $ind) );
					$mapKey = substr ( $response, ($ind = strpos ( $response, ">" )) + 1, ((strpos ( $response, "</" . $start . ">" ) - 1) - $ind) );
					// // echo "<br/> strrsdfdpos".(strrpos($response,">"));
					$response = substr ( $response, $from = strpos ( $response, "</" . $start . ">" ) + strlen ( $start ) + 3, strrpos ( $response, ">" ) - $from + 1 );
					// // echo "<br/> from ".$from;
					// // echo "<br/> start------- ".$start;
					// // echo "--------".$mapKey;
					$maps [$start] = $mapKey;
					
					// // echo "------ response====".htmlspecialchars($response)."<br/>";
				} else {
					// // echo "here";
					break;
				}
			} while ( strlen ( $response ) > 0 );
		}
		
		// // echo "<br/>MAPPPPPPPS ".var_dump($maps);
		return $maps;
	}
	function setTransactionData($resultMap) {
		if (isset ( $resultMap ['error'] )) {
			$this->error = trim ( $resultMap ['error'] );
		}
		if (isset ( $resultMap ['url'] ))
			$this->acsurl = trim ( $resultMap ['url'] );
			// $responseTemp = $resultMap['PAReq'];
		if (isset ( $resultMap ['PAReq'] ))
			$this->pareq = trim ( $resultMap ['PAReq'] );
			// $responseTemp = $resultMap['paymentid'];
		if (isset ( $resultMap ['paymentid'] ))
			$this->paymentId = trim ( $resultMap ['paymentid'] );
			// $responseTemp = $resultMap['payid'];
		if (isset ( $resultMap ['payid'] ))
			$this->paymentId = trim ( $resultMap ['payid'] );
			// $responseTemp = $resultMap['eci'];
		if (isset ( $resultMap ['eci'] ))
			$this->eci = trim ( $resultMap ['eci'] );
			// $responseTemp = $resultMap['result'];
		if (isset ( $resultMap ['result'] ))
			$this->result = trim ( $resultMap ['result'] );
			// $responseTemp = $resultMap['auth'];
		if (isset ( $resultMap ['auth'] ))
			$this->auth = trim ( $resultMap ['auth'] );
			// $responseTemp = $resultMap['ref'];
		if (isset ( $resultMap ['ref'] ))
			$this->ref = trim ( $resultMap ['ref'] );
			// $responseTemp = $resultMap['avr'];
		if (isset ( $resultMap ['avr'] ))
			$this->avr = trim ( $resultMap ['avr'] );
			// $responseTemp = $resultMap['postdate'];
		if (isset ( $resultMap ['postdate'] ))
			$this->date = trim ( $resultMap ['postdate'] );
			// $responseTemp = $resultMap['tranid'];
		if (isset ( $resultMap ['tranid'] ))
			$this->transId = trim ( $resultMap ['tranid'] );
			// $responseTemp = $resultMap['amt'];
		if (isset ( $resultMap ['amt'] ))
			$this->amt = trim ( $resultMap ['amt'] );
			// $responseTemp = $resultMap['trackid'];
		if (isset ( $resultMap ['trackid'] ))
			$this->trackId = trim ( $resultMap ['trackid'] );
			// $responseTemp = $resultMap['udf1'];
		if (isset ( $resultMap ['udf1'] ))
			$this->udf1 = trim ( $resultMap ['udf1'] );
			// $responseTemp = $resultMap['udf2'];
		if (isset ( $resultMap ['udf2'] ))
			$this->udf2 = trim ( $resultMap ['udf2'] );
			// $responseTemp = $resultMap['udf3'];
		if (isset ( $resultMap ['udf3'] ))
			$this->udf3 = trim ( $resultMap ['udf3'] );
			// $responseTemp = $resultMap['udf4'];
		if (isset ( $resultMap ['udf4'] ))
			$this->udf4 = trim ( $resultMap ['udf4'] );
			// $responseTemp = $resultMap['udf5'];
		if (isset ( $resultMap ['udf5'] ))
			$this->udf5 = trim ( $resultMap ['udf5'] );
			
			
		// $responseTemp = $resultMap['udf6'];
		if (isset ( $resultMap ['udf6'] ))
			$this->udf6 = trim ( $resultMap ['udf6'] );

		// $responseTemp = $resultMap['udf7'];
		if (isset ( $resultMap ['udf7'] ))
			$this->udf7 = trim ( $resultMap ['udf7'] );
			
		// $responseTemp = $resultMap['udf8'];
		if (isset ( $resultMap ['udf8'] ))
			$this->udf8 = trim ( $resultMap ['udf8'] );
			
		// $responseTemp = $resultMap['udf9'];
		if (isset ( $resultMap ['udf9'] ))
			$this->udf9 = trim ( $resultMap ['udf9'] );
			
		// $responseTemp = $resultMap['udf10'];
		if (isset ( $resultMap ['udf10'] ))
			$this->udf10 = trim ( $resultMap ['udf10'] );
			
			
		if (isset ( $resultMap ['udf11'] ))
			$this->udf11 = trim ( $resultMap ['udf11'] );
			// $responseTemp = $resultMap['udf12'];
		if (isset ( $resultMap ['udf12'] ))
			$this->udf12 = trim ( $resultMap ['udf12'] );
			// $responseTemp = $resultMap['udf13'];
		if (isset ( $resultMap ['udf13'] ))
			$this->udf13 = trim ( $resultMap ['udf13'] );
			// $responseTemp = $resultMap['udf14'];
		if (isset ( $resultMap ['udf14'] ))
			$this->udf14 = trim ( $resultMap ['udf14'] );
			// $responseTemp = $resultMap['udf15'];
		if (isset ( $resultMap ['udf15'] ))
			$this->udf15 = trim ( $resultMap ['udf15'] );
			
			
		// $responseTemp = $resultMap['udf16'];
		if (isset ( $resultMap ['udf16'] ))
			$this->udf16 = trim ( $resultMap ['udf16'] );

		// $responseTemp = $resultMap['udf17'];
		if (isset ( $resultMap ['udf17'] ))
			$this->udf17 = trim ( $resultMap ['udf17'] );
			
		// $responseTemp = $resultMap['udf18'];
		if (isset ( $resultMap ['udf18'] ))
			$this->udf18 = trim ( $resultMap ['udf18'] );
			
		// $responseTemp = $resultMap['udf19'];
		if (isset ( $resultMap ['udf19'] ))
			$this->udf19 = trim ( $resultMap ['udf19'] );
			
		// $responseTemp = $resultMap['udf20'];
		if (isset ( $resultMap ['udf20'] ))
			$this->udf20 = trim ( $resultMap ['udf20'] );
			
			
		if (isset ( $resultMap ['udf21'] ))
			$this->udf21 = trim ( $resultMap ['udf21'] );
			// $responseTemp = $resultMap['udf22'];
		if (isset ( $resultMap ['udf22'] ))
			$this->udf22 = trim ( $resultMap ['udf22'] );
			// $responseTemp = $resultMap['udf23'];
		if (isset ( $resultMap ['udf23'] ))
			$this->udf23 = trim ( $resultMap ['udf23'] );
			// $responseTemp = $resultMap['udf24'];
		if (isset ( $resultMap ['udf24'] ))
			$this->udf24 = trim ( $resultMap ['udf24'] );
		
		// $responseTemp = $resultMap['udf25'];
		if (isset ( $resultMap ['udf25'] ))
			$this->udf25 = trim ( $resultMap ['udf25'] );
			
			
		// $responseTemp = $resultMap['udf26'];
		if (isset ( $resultMap ['udf26'] ))
			$this->udf26 = trim ( $resultMap ['udf26'] );

		// $responseTemp = $resultMap['udf27'];
		if (isset ( $resultMap ['udf27'] ))
			$this->udf27 = trim ( $resultMap ['udf27'] );
			
		// $responseTemp = $resultMap['udf28'];
		if (isset ( $resultMap ['udf28'] ))
			$this->udf28 = trim ( $resultMap ['udf28'] );
			
		// $responseTemp = $resultMap['udf29'];
		if (isset ( $resultMap ['udf29'] ))
			$this->udf29 = trim ( $resultMap ['udf29'] );
			
		// $responseTemp = $resultMap['udf30'];
		if (isset ( $resultMap ['udf30'] ))
			$this->udf30 = trim ( $resultMap ['udf30'] );
			
					
		if (isset ( $resultMap ['udf31'] ))
			$this->udf31 = trim ( $resultMap ['udf31'] );
			
		// $responseTemp = $resultMap['udf32'];
		if (isset ( $resultMap ['udf32'] ))
			$this->udf32 = trim ( $resultMap ['udf32'] );
			
				
			
			// $responseTemp = $resultMap['error_code_tag'];
		if (isset ( $resultMap ['error_code_tag'] ))
			$this->error = trim ( $resultMap ['error_code_tag'] );
			// $responseTemp = $resultMap['error_service_tag'];
		if (isset ( $resultMap ['error_service_tag'] ))
			$this->error_service_tag = trim ( $resultMap ['error_service_tag'] );
			// $responseTemp = $resultMap['error_text'];
		if (isset ( $resultMap ['error_text'] ))
			$this->error_text = trim ( $resultMap ['error_text'] );
			// $responseTemp = $resultMap['responsecode'];
		if (isset ( $resultMap ['responsecode'] ))
			$this->responseCode = trim ( $resultMap ['responsecode'] );
			// $responseTemp = $resultMap['cvv2response'];
		if (isset ( $resultMap ['cvv2response'] ))
			$this->cvv2Verification = trim ( $resultMap ['cvv2response'] );
			// $responseTemp = $resultMap['paymentId'];
		if (isset ( $resultMap ['paymentId'] ))
			$this->paymentdebitId = trim ( $resultMap ['paymentId'] );
			// $responseTemp = $resultMap['paymenturl'];
		if (isset ( $resultMap ['paymenturl'] )) {
			$this->paymentUrl = trim ( $resultMap ['paymenturl'] );
			return 2;
		}
		return 0;
	}
	function parsetrandata($trandata) {
		try {
			// // echo "<br/><br/><br/>".var_dump($splitData = $this->splitData ( $trandata )).$splitData ['Error'];
			$splitData = $this->splitData ( $trandata );
			// // echo "<br/><br/>".var_dump($splitData);
			if (isset ( $splitData ['paymentid'] )) {
				$this->paymentId = $splitData ['paymentid'];
			}
			if (isset ( $splitData ['result'] )) {
				$this->result = $splitData ['result'];
			}
			if (isset ( $splitData ['udf1'] )) {
				$this->udf1 = $splitData ['udf1'];
			}
			if (isset ( $splitData ['udf2'] )) {
				$this->udf2 = $splitData ['udf2'];
			}
			if (isset ( $splitData ['udf3'] )) {
				$this->udf3 = $splitData ['udf3'];
			}
			if (isset ( $splitData ['udf4'] )) {
				$this->udf4 = $splitData ['udf4'];
			}
			if (isset ( $splitData ['udf5'] )) {
				$this->udf5 = $splitData ['udf5'];
			}
			
			if (isset ( $splitData ['udf6'] )) {
				$this->udf6 = $splitData ['udf6'];
			}
			if (isset ( $splitData ['udf7'] )) {
				$this->udf7 = $splitData ['udf7'];
			}
			if (isset ( $splitData ['udf8'] )) {
				$this->udf8 = $splitData ['udf8'];
			}
			if (isset ( $splitData ['udf9'] )) {
				$this->udf9 = $splitData ['udf9'];
			}
			if (isset ( $splitData ['udf10'] )) {
				$this->udf10 = $splitData ['udf10'];
			}
			
			
			if (isset ( $splitData ['udf11'] )) {
				$this->udf11 = $splitData ['udf11'];
			}
			if (isset ( $splitData ['udf12'] )) {
				$this->udf12 = $splitData ['udf12'];
			}
			if (isset ( $splitData ['udf13'] )) {
				$this->udf13 = $splitData ['udf13'];
			}
			if (isset ( $splitData ['udf14'] )) {
				$this->udf14 = $splitData ['udf14'];
			}
			if (isset ( $splitData ['udf15'] )) {
				$this->udf15 = $splitData ['udf15'];
			}
			
			if (isset ( $splitData ['udf16'] )) {
				$this->udf16 = $splitData ['udf16'];
			}
			if (isset ( $splitData ['udf17'] )) {
				$this->udf17 = $splitData ['udf17'];
			}
			if (isset ( $splitData ['udf18'] )) {
				$this->udf18 = $splitData ['udf18'];
			}
			if (isset ( $splitData ['udf19'] )) {
				$this->udf19 = $splitData ['udf19'];
			}
			if (isset ( $splitData ['udf20'] )) {
				$this->udf20 = $splitData ['udf20'];
			}
			
			
			if (isset ( $splitData ['udf21'] )) {
				$this->udf21 = $splitData ['udf21'];
			}
			if (isset ( $splitData ['udf22'] )) {
				$this->udf22 = $splitData ['udf22'];
			}
			if (isset ( $splitData ['udf23'] )) {
				$this->udf23 = $splitData ['udf23'];
			}
			if (isset ( $splitData ['udf24'] )) {
				$this->udf24 = $splitData ['udf24'];
			}
			if (isset ( $splitData ['udf25'] )) {
				$this->udf25 = $splitData ['udf25'];
			}
			
			if (isset ( $splitData ['udf26'] )) {
				$this->udf26 = $splitData ['udf26'];
			}
			if (isset ( $splitData ['udf27'] )) {
				$this->udf27 = $splitData ['udf27'];
			}
			if (isset ( $splitData ['udf28'] )) {
				$this->udf28 = $splitData ['udf28'];
			}
			if (isset ( $splitData ['udf29'] )) {
				$this->udf29 = $splitData ['udf29'];
			}
			if (isset ( $splitData ['udf30'] )) {
				$this->udf30 = $splitData ['udf30'];
			}
			
			if (isset ( $splitData ['udf31'] )) {
				$this->udf31 = $splitData ['udf31'];
			}
			if (isset ( $splitData ['udf32'] )) {
				$this->udf32 = $splitData ['udf32'];
			}
			
			
			
			if (isset ( $splitData ['amt'] )) {
				$this->amt = $splitData ['amt'];
			}
			if (isset ( $splitData ['auth'] )) {
				$this->auth = $splitData ['auth'];
			}
			if (isset ( $splitData ['ref'] )) {
				$this->ref = $splitData ['ref'];
			}
			if (isset ( $splitData ['tranid'] )) {
				$this->transId = $splitData ['tranid'];
			}
			if (isset ( $splitData ['postdate'] )) {
				$this->date = $splitData ['postdate'];
			}
			if (isset ( $splitData ['trackId'] )) {
				$this->trackId = $splitData ['trackId'];
			}
			if (isset ( $splitData ['trackid'] )) {
				$this->trackId = $splitData ['trackid'];
			}
			if (isset ( $splitData ['action'] )) {
				$this->action = $splitData ['action'];
			}
			if (isset ( $splitData ['Error'] )) {
				$this->error = $splitData ['Error'];
			}
			if (isset ( $splitData ['ErrorText'] )) {
				$this->error_text = $splitData ['ErrorText'];
			}
			if (isset ( $splitData ['error_text'] )) {
				$this->error_text = $splitData ['error_text'];
			}
			if (isset ( $splitData ['card'] )) {
				$this->card = $splitData ['card'];
			}
			if (isset ( $splitData ['member'] )) {
				$this->member = $splitData ['member'];
			}
			if (isset ( $splitData ['type'] )) {
				$this->type = $splitData ['type'];
			}
			if (isset ( $splitData ['pmntmode'] )) {
				$this->pmntmode = $splitData ['pmntmode'];
			}
		} catch ( Exception $e ) {
			
			return - 1;
		}
		return 0;
	}
	function splitData($trandata) {
		$splitData;
		$data = explode ( "&", $trandata );
		// // echo "DATA ".var_dump($data);
		foreach ( $data as $value ) {
			$temp = explode ( "=", $value );
			// // echo "<br/> TEMP".var_dump($temp);
			$splitData [$temp [0]] = $temp [1];
			// // echo "<br/>".$splitData[$temp[0]];
		}
		return $splitData;
	}
	function encryptData($str, $key) {
		$block = mcrypt_get_block_size ( 'tripledes', 'ecb' );
		$pad = $block - (strlen ( $str ) % $block);
		$str .= str_repeat ( chr ( $pad ), $pad );
		$cipher = mcrypt_encrypt ( MCRYPT_3DES, $key, $str, MCRYPT_MODE_ECB );
		// // echo "CIPHERED TEXT IS " . bin2hex ( $cipher );
		return bin2hex ( $cipher );
	}

	
	function decryptDataNew($data, $key){
		// $data = base64_encode($data);
		$iv_size    = mcrypt_get_block_size ( 'tripledes', 'ecb' );
		$iv         = mcrypt_create_iv($iv_size, MCRYPT_RAND);
		// rtrim(mcrypt_decrypt(MCRYPT_3DES, $key, $encryptedData, MCRYPT_MODE_ECB), "\0");
		$decrypt    = rtrim(mcrypt_decrypt(MCRYPT_3DES, $key, $data, MCRYPT_MODE_ECB, "\0"));
		//echo $decrypt . "<br/><br/><br/><br/>";
		$strPad = ord($decrypt[strlen($decrypt)-1]);
		$newData = substr($decrypt, 0, -$strPad);

		//echo $newData . "<br/><br/><br/><br/>";
		$final      = trim($newData, "\0");
		return $final;
	}
	
	
	function decryptData($data, $key) {
		$data =  hex2bin($data);
		$data = mcrypt_decrypt( MCRYPT_3DES, $key, $data, MCRYPT_MODE_ECB);
		 $block = mcrypt_get_block_size ( 'tripledes', 'ecb' );
		$strPad = ord($data[strlen($data)-1]);
		
		
	//	$newData = substr($data, 0, -$strPad);
	
		$newData = substr($data, 0, (strpos($data, '^')-1));
		$newData = rtrim($newData, "\0");
		
		return $newData;
	}
}
?>
