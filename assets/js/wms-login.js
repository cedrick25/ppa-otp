/* 
 * This the Login js of WMS 
 *  Portal web services.
 */

$ = (typeof $ !== 'undefined') ? $ : {};
$.wms.login = (typeof $.wms.login !== 'undefined') ? $.wms : {};

$.wms.login = (function() {

    var __attachLoginEvent = function() {
        
        $("#divLoading").addClass("hidden");
        $("#divLogin").fadeIn();


        $("#txtUsername").focus();
        $.wms.dashboard.navHighlight();
        $("#txtUsername,#txtPassword").keyup(function(event){
            if(event.keyCode == 13){
                $("#btnLogin").click();
            }
        });


        $("#btnLogin").unbind("click").on("click",function(){
            $("#divLoading").removeClass("hidden");
            //init
            $("#divAlert,#divInactive").addClass("hidden");

            var username = $("#txtUsername").val();
            var password = $("#txtPassword").val();

            var payload = {
                   USERNAME : username,
                   PASSWORD : password
            }

            $.wms.executeExternalPost($.wms.apiBase + '/wsv1/api/authenticate',JSON.stringify(payload)).done(function (result) {
                //console.log(result);
                $("#divLoading").addClass("hidden");
                if(result.status == 'SUCCESS'){

                    if(result.payload.USER_STATUS === '0'){
                        $("#divInactive").removeClass("hidden")
                    }else{

                        if(result.payload.USER_LEVEL_ID == 1){
                            var payload2 = {
                                LEVEL_ID : result.payload.USER_LEVEL_ID
                            }
                            var date = new Date();
                            date.setTime(date.getTime() + (180 * 1440 * 60 * 1000));
                            $.wms.executeExternalPost($.wms.apiBase + '/wsv1/api/getUserTypeByModulesByID',JSON.stringify(payload2)).done(function (result2) {
                            if(result2.status == 'SUCCESS'){
                                $.cookie("PERMISSIONS", JSON.stringify(result2.payload), {expires: date});
                               
                            }             

                                $("#divSuccess").removeClass("hidden");
                                $("#divOtpEnter").addClass("hidden");
                                $("#divOtpSuccess").removeClass("hidden");
                                //alert("Login Success!")
                                var USER_ID = result.payload.USER_ID
                                var USER_NAME = result.payload.USER_NAME
                                var USER_STATUS = result.payload.USER_STATUS
                                var USER_LEVEL_ID = result.payload.USER_LEVEL_ID
                                var USER_FULLNAME = result.payload.USER_FULLNAME
                                var USER_EMAIL = result.payload.USER_EMAIL
                                var FIELD_OFFICE = result.payload.FIELD_OFFICE
                                var H = result.payload.HASH

                                
                                $.cookie("USER_ID", USER_ID, {expires: date});
                                $.cookie("USER_NAME", USER_NAME, {expires: date});
                                $.cookie("USER_FULLNAME", USER_FULLNAME, {expires: date});
                                $.cookie("USER_EMAIL", USER_EMAIL, {expires: date});
                                $.cookie("FIELD_OFFICE", FIELD_OFFICE, {expires: date});
                                $.cookie("USER_STATUS", USER_STATUS, {expires: date});
                                $.cookie("USER_LEVEL_ID", USER_LEVEL_ID, {expires: date});
                                $.cookie("H", H, {expires: date});
                                setTimeout(function () {
                                    window.location.href="dashboard"
                                },1000);
                            });
                        }else{


                        $("#divLogin").addClass("hidden");
                        $("#divLoginOTP").removeClass("hidden");

                        $("#btnLoginOtp").unbind("click").on("click",function(){
                            if($("#txtLoginOtp").val() == 'ppa2021'){


                                        var payload2 = {
                                            LEVEL_ID : result.payload.USER_LEVEL_ID
                                        }
                                        var date = new Date();
                                        date.setTime(date.getTime() + (180 * 1440 * 60 * 1000));
                                        $.wms.executeExternalPost($.wms.apiBase + '/wsv1/api/getUserTypeByModulesByID',JSON.stringify(payload2)).done(function (result2) {
                                        if(result2.status == 'SUCCESS'){
                                            $.cookie("PERMISSIONS", JSON.stringify(result2.payload), {expires: date});
                                           
                                        }             

                                            $("#divOtpEnter").addClass("hidden");
                                            $("#divOtpSuccess").removeClass("hidden");
                                            //alert("Login Success!")
                                            var USER_ID = result.payload.USER_ID
                                            var USER_NAME = result.payload.USER_NAME
                                            var USER_STATUS = result.payload.USER_STATUS
                                            var USER_LEVEL_ID = result.payload.USER_LEVEL_ID
                                            var USER_FULLNAME = result.payload.USER_FULLNAME
                                            var FIELD_OFFICE = result.payload.FIELD_OFFICE
                                            var H = result.payload.HASH
                                            var USER_EMAIL = result.payload.USER_EMAIL
                                            $.cookie("USER_EMAIL", USER_EMAIL, {expires: date});
                                            $.cookie("USER_ID", USER_ID, {expires: date});
                                            $.cookie("USER_NAME", USER_NAME, {expires: date});
                                            $.cookie("USER_FULLNAME", USER_FULLNAME, {expires: date});
                                            $.cookie("FIELD_OFFICE", FIELD_OFFICE, {expires: date});
                                            $.cookie("USER_STATUS", USER_STATUS, {expires: date});
                                            $.cookie("USER_LEVEL_ID", USER_LEVEL_ID, {expires: date});
                                            $.cookie("H", H, {expires: date});
                                            setTimeout(function () {
                                                window.location.href="dashboard"
                                            },1000);
                                        });
                                }else{
                                    alert("Invalid OTP");
                                }
                            });

                        }
                        

                        
                    }

                    
                }else{
                    $("#divAlert").removeClass("hidden");
                    $("#txtPassword").focus();
                }
            });
        });
    };



    
    return {
        attachLoginEvent : __attachLoginEvent
    };
}());
