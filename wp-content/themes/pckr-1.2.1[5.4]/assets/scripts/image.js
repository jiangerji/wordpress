jQuery(document).ready(function(P){var N=P("#imgdelete");C=true,A=wp.media.editor.send.attachment,D=P("#newsubmit"),B=P("#unedit-bg");P("#image-upload").click(function(F){F.preventDefault();F.returnValue=false;D.attr("disabled",false);B.removeAttr("unable").fadeOut();P("#image-tips").addClass("uploaded");N.show();var E=wp.media.editor.send.attachment;var G=P(this);C=true;wp.media.editor.send.attachment=function(J,S){if(C){var T='<img src="'+S.url+'" width="'+S.width+'" height="'+S.height+'" />',I=ajax_url+S.url+"&w=70&h=70&zc=1",H='<div  class="img" rs="'+S.url+'" rw="'+S.width+'" rh="'+S.height+'" style="background:url('+I+') no-repeat;"></div>';P("#image-preview").append(H);P("#image-value").val(P("#image-value").val()+T)}else{return A.apply(this,[J,S])}};wp.media.editor.open(G);return false});var L=(function(){var H=[],F=null,E=function(){var I=0;for(;I<H.length;I++){H[I].end?H.splice(I--,1):H[I]()}!H.length&&G()},G=function(){clearTimeout(F);F=null};return function(c,d,I,b){var e,f,a,J,Z,Y=new Image();Y.src=c;if(Y.complete){d(Y.width,Y.height);I&&I(Y.width,Y.height);return}f=Y.width;a=Y.height;e=function(){J=Y.width;Z=Y.height;if(J!==f||Z!==a||J*Z>1024){d(J,Z);e.end=true}};e();Y.onerror=function(){b&&b();J=Z=0;d(J,Z);e.end=true;Y=Y.onload=Y.onerror=null};Y.onload=function(){I&&I(Y.width,Y.height);!e.end&&e();Y=Y.onload=Y.onerror=null};if(!e.end){H.push(e);if(F===null){F=setTimeout(E,50)}}}})(),M=new Array(),K=0;P("#outer-chain-start").click(function(F){F.preventDefault();F.returnValue=false;var J=P("#outer-chain-textarea").val(),U=J.split("\n");H(U);M=X(M);var I,G=-1,V=M.length;if(V<=K){return false}for(I=K;I<V;I++){P("#outer-chain-preview ul").append("<li>"+M[I]+"</li>")}K=V;P("#outer-chain-textarea").css({height:P("#outer-chain-main").height()-P("#outer-chain-preview").height()-21});W();function W(){if(G<V-1){G++;console.log(M[0]);L(M[G],function(R,Q){console.log(G);if(!R&&!Q){P("#outer-chain-preview ul li").eq(G).addClass("errors")}else{P("#outer-chain-preview ul li").eq(G).addClass("success").attr({"mfwidth":R,"mfheight":Q})}W()})}else{P("#outer-chain-button").removeAttr("disabled")}}function H(R){for(var S=0,Q=R.length;S<Q;S++){if(R[S]!=""&&R[S]!=undefined&&E(R[S])&&(jQuery.inArray(R[S],M)==-1)){M.push(R[S])}}}function X(S){var T=[];for(var R=0,Q=S.length;R<Q;++R){jQuery.inArray(S[R],T)<0&&T.push(S[R])}return T}function E(Q){regExp=/(http[s]?|ftp):\/\/[^\/\.]+?\..+\w$/i;return Q.match(regExp)?true:false}return false});P("#outer-chain-button").on("click",function(E){E.preventDefault();E.returnValue=false;if(P(this).attr("disabled")){return false}P("#outer-chain-preview ul li.success").each(function(){var H='<img src="'+P(this).text()+'" width="'+P(this).attr("mfwidth")+'" height="'+P(this).attr("mfheight")+'" />',G=ajax_url+P(this).text()+"&w=70&h=70&zc=1",F='<div class="img" rs="'+P(this).text()+'" rw="'+P(this).attr("mfwidth")+'" rh="'+P(this).attr("mfheight")+'" style="background:url('+G+') no-repeat;"></div>';P("#image-preview").append(F);P("#image-value").val(P("#image-value").val()+H)});P("#outer-chain-textarea").val("");P("#outer-chain-preview ul").empty();P("#outer-chain, #outer-chain-lay").hide();return false});P("#image-upload2").click(function(E){E.preventDefault();E.returnValue=false;D.attr("disabled",false);B.removeAttr("unable").fadeOut();N.show();P("#image-tips").addClass("uploaded");P("#outer-chain, #outer-chain-lay").show();return false});P("#outer-chain-close").click(function(E){E.preventDefault();E.returnValue=false;P("#outer-chain, #outer-chain-lay").hide();return false});P("#image-preview").on("mousedown",".img",O);P("#image-preview").off("mouseup",".img",O);function O(E){var b=P(this),H=P(document),X=P('<div class="tmp"></div>').insertBefore(b),W=P("#single").offset().left,a=P("#single").offset().top,I=N.offset().left-W,F=N.offset().top-a,G=false;b.css({position:"absolute",left:E.pageX-W-35,top:E.pageY-a-35,zIndex:9999});H.on("mousemove",Z);H.on("mouseup",Y);function Z(R){if(G){return}var Q=R.pageX-W-35,S=R.pageY-a-35;if(Q>=I-70&&Q<=I+70&&S>=F-70&&S<=F+70){N.addClass("hover")}else{N.removeClass("hover")}b.css({left:Q,top:S});P("#image-preview .img").each(function(){var U=P(this);if(U!=b){var f=U.offset().left-W,V=U.offset().top-a;if(Q>=f&&Q<=f+70&&S>=V&&S<=V+70){var e=U.clone(),T=X.clone();T.insertBefore(U);e.insertBefore(X);X.remove();U.remove();X=T}}})}function Y(S){G=true;var T=S.pageX-W-35,Q=S.pageY-a-35;if(T>=I&&T<=I+70&&Q>=F&&Q<=F+70){X.remove();b.animate({width:0,height:0,left:I+35,top:F+35},700,function(){b.remove();N.removeClass("hover");deelte=false;H.off("mousemove",Z);H.off("mouseup",Y);J()})}else{var R=b.clone();R.insertBefore(X);X.remove();b.remove();R.css({position:"",left:"",top:"",zIndex:""});H.off("mousemove",Z);H.off("mouseup",Y);J()}return false}function J(){P("#image-value").val("");P("#image-preview .img").each(function(){var R=P(this),Q='<img src="'+R.attr("rs")+'" width="'+R.attr("rw")+'" height="'+R.attr("rh")+'" />';P("#image-value").val(P("#image-value").val()+Q)})}}});