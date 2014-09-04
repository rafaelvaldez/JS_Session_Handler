(function($, SM, undefined) {

	SM.TM = SM.TM || {};	
	SM.TM.Handler = (function() {
		
	    var _InitTimer, 
	    _InitModalTimer,
	    _WindowTimer, 
	    _Timeout = null, 
	    extendSession = $("#extendSession"), 
	    closeSession = $("#closeSession"),
	    _ModalTimer, 
	    _ModalInterval, 
	    buttonBinder = (function() {
	        // extend the session binding
	        extendSession.click(function() {
	            _ResetModalTimer();
	            clearInterval(_ModalInterval); // stops the modal counter
	            _RefreshServerSession().done(function(){ //refreshes session on server
	                $("#modalTimer").text(_ModalTimer);
	            });
	        });
	        //logout
	        closeSession.click(function() {
	            _LogOut();
                });
	        
	        
	
	    })();
	
	    /* resets the modal counter */
	    function _ResetModalTimer() {
	        _ModalTimer = _InitModalTimer;
	    }
	    ;
	
	    /* resets current window timer */
	    function _ResetWindowTimer() {
	        _WindowTimer = _InitTimer;
	    }
	    ;
	
	    /* resets the time when there's acvity */
	    function _DetectActivity() {
	        _ResetWindowTimer();
	    }
	    ;
	
	    /* redirects to logout */
	    function _LogOut() {
	    	window.location.replace(SM.TM.baseUrl  + '/session/logout.php');
	    }
	    
	    /* refreshes to session */
            function _RefreshServerSession() {
                return $.ajax({
                    url : SM.TM.baseUrl + '/session/keepAlive.php',                    
                });
            }
	
	    /*
	     * This is the internal modal counter if it reaches to zero the user will be
	     * logged out
	     */
	    function countDownModal() {
	        _ModalTimer--;
	        $('#modalTimer').text(_ModalTimer>=0 ? _ModalTimer : 0);
	        if (_ModalTimer == -1) {
	            clearInterval(_ModalInterval);
	            _LogOut();
	        }
	    }
	    ;
	    /*
	     * This function synchornizes the countdown on each window, when one of them
	     * reaches zero (after the set innactivity period has been met) it will
	     * trigger the modal
	     */
	    function _CountDownSession() {
	
	        localStorage.setItem('sessionTime',
	                localStorage.getItem('sessionTime') - 1);
	        _WindowTimer--;
	        if (_WindowTimer > localStorage.getItem('sessionTime')) {
	            localStorage.setItem('sessionTime', _WindowTimer)
	        } else {
	            _WindowTimer = localStorage.getItem('sessionTime');
	        }
	        if (_WindowTimer == 0) {
	            $('#sessionModal').modal('show');
	            _ModalInterval = setInterval(countDownModal, 1000);
	        }
	    }
	    ;
	
	    return {
	        /*
	         * Initiliazer, first parameter sets the window timer, the modal timer
	         * sets the timer on the window
	         */
	        init : function(timer, modalTimer) {
	            _InitTimer = timer;
	            _InitModalTimer = modalTimer;
	            _WindowTimer = timer;
	            _ModalTimer = modalTimer;
	            $("#modalTimer").text(_InitModalTimer);        
	            localStorage.setItem('sessionTime', _WindowTimer)
	            setInterval(_CountDownSession, 1000);
	            $(document).on('click keyup mousemove', _DetectActivity);
	        }	        
	    };
	
	})();
	
	SM.TM.Handler.init(SM.TM.sessionIdleSeconds, SM.TM.modalWarningSeconds);

})(jQuery, window.SM = window.SM || {});