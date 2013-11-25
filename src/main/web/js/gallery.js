var tubePressGalleryRegistrar,TubePressGallery=(function(h,g,p){var w="tubepress",l=w+".gallery.",e=w+".video.",d=w+".playerlocation.",j=d+"populate",c=d+"invoke",u=l+"load",x=l+"newthumbs",E=l+"pagechange",f=l+"changevideo",q=l+"nextvideo",k=l+"previousvideo",b=e+"start",r=e+"stop",v="urls",i="sys",n="js",F=p.Beacon,o=F.subscribe,A=F.publish,a=p.Lang.Utils,D=p.Environment,t=p.DomInjector,z="src/main/web/js",B=true,C=false,m=g.TubePressJsConfig,s=(function(){var W={},T="nvpMap",V="jsMap",L="page",G="currentVideoId",ab="playingNow",ac=a.parseIntOrZero,S="playerLocation",af="embedded",aa=F.subscribe,Z=function(ap){return a.isDefined(W[ap])},ae=function(ap,ar,aq){return Z(ap)?W[ap][ar][aq]:null},ad=function(ap){return Z(ap)?W[ap][L]:undefined},Q=function(ap){return Z(ap)?W[ap][G]:undefined},K=function(ap){return ae(ap,V,"ajaxPagination")},U=function(ap){return ae(ap,V,"autoNext")},J=function(ap){return Z(ap)?W[ap][ab]:C},H=function(ap){return ae(ap,V,"fluidThumbs")},ao=function(ap){return ae(ap,T,af+"Height")},an=function(ap){return ae(ap,T,af+"Width")},ak=function(ap){return ae(ap,V,"httpMethod")},M=function(ap){return W[ap][T]},ag=function(ap){return ae(ap,T,S)},P=function(ap){return ae(ap,V,S+"JsUrl")},N=function(ap){return ae(ap,V,S+"ProducesHtml")},Y=function(ap){return ae(ap,V,"sequence")},al=function(ap){return"#"+w+"_gallery_"+ap+"_thumbnail_area"},ai=function(au,at,av){var ar=a.getParameterByName(w+"_page"),ap=ac(ar),aq="ajaxPagination",aw;W[at]=av;W[at][L]=ap===0?1:ap;W[at][ab]=C;aw=Y(at);if(aw){W[at][G]=aw[0]}if(K(at)){if(a.hasOwnNestedProperty(m,v,n,i,aq)){t.loadJs(m[v][n][i][aq])}else{t.loadJs(z+"/"+aq+".js")}}},X=function(at,ar,aq){if(Z(ar)){var ap=ac(aq);W[ar][L]=ap===0?1:ap}},ah=function(aq){var ap;for(ap in W){if(W.hasOwnProperty(ap)){if(aq(ap)){return ap}}}return undefined},I=function(aq){var ap='[id^="'+aq+'"]',ar=function(au){var at=h("#"+w+"_gallery_"+au);if(!at.length){return false}return at.find(ap).length>0};return ah(ar)},am=function(ar,aq,ap){var at=I(ap);if(!at){return}W[at][J]=C},aj=function(ar,aq,ap){var at=I(ap);if(!at){return}W[at][J]=B;W[at][G]=aq},O=function(aq,ap,ar){if(Z(ap)){W[ap][G]=ar}},R=function(){var ap=[],aq;for(aq in W){ap.push(aq)}return ap};aa(u,ai);aa(E,X);aa(f,O);aa(r,am);aa(b,aj);return{isAjaxPagination:K,isAutoNext:U,isCurrentlyPlayingVideo:J,isFluidThumbs:H,isRegistered:Z,findAllGalleryIds:R,findGalleryContainingVideoDomId:I,getCurrentPageNumber:ad,getCurrentVideoId:Q,getEmbeddedHeight:ao,getEmbeddedWidth:an,getHttpMethod:ak,getNvpMap:M,getPlayerLocationName:ag,getPlayerLocationProducesHtml:N,getPlayerLocationJsUrl:P,getSequence:Y,getThumbAreaSelector:al}}()),y=(function(){var G=function(H,I){A(u,[H,I])};return{register:G}}());(function(){var J=Math.floor,I=function(N){return s.getThumbAreaSelector(N)},H=function(N){return h(I(N))},G=function(Q){var O=H(Q),N=O.find("img:first"),P=120;if(N.length===0){N=O.find("div."+w+"_thumb:first > div."+w+"_embed");if(N.length===0){return P}}P=N.attr("width");if(P){return P}return N.width()},K=function(S){H(S).css({width:"100%"});var Q=I(S),U=G(S),O=h(Q),T=O.width(),P=J(T/U),R=J(T/P),N=h(Q+" div."+w+"_thumb");O.css({width:"100%"});O.css({width:T});N.css({width:R})},M=function(O,N){if(s.isFluidThumbs(N)){K(N)}},L=function(Q){var O=s.findAllGalleryIds(),N=0,P=O.length;for(N;N<P;N+=1){M(Q,O[N])}};o(x+" "+u,M);o(w+".window.resize",L)}());(function(){var I=function(K){return K[3]},G=function(L){var K=L.lastIndexOf("_");return L.substring(16,K)},H=function(){var K=h(this).attr("rel").split("_"),L=I(K),M=G(h(this).attr("id"));A(f,[L,M])},J=function(L,K){h("#"+w+"_gallery_"+K+" a[id^='"+w+"_']").click(H)};o(x+" "+u,J)}());(function(){var G=function(K,I){var J=s.getPlayerLocationJsUrl(I);t.loadJs(J)},H=function(N,R,O){var K=s.getPlayerLocationName(R),Q=s.getEmbeddedHeight(R),J=s.getEmbeddedWidth(R),L=s.getNvpMap(R),P=function(U){var S=p.Lang.JsonParser.parse(U.responseText),V=S.title,T=S.html;A(j,[K,V,T,Q,J,O,R])},M={action:"playerHtml",tubepress_video:O},I;h.extend(M,L);A(c,[K,Q,J,O,R]);if(s.getPlayerLocationProducesHtml(R)){I=s.getHttpMethod(R);p.Ajax.Executor.get(I,D.getAjaxEndpointUrl(),M,P,"json")}};o(u,G);o(f,H)}());(function(){var G=function(I,J){var K=I.data("page");A(E,[J,K])},H=function(J,I){var K=function(){G(h(this),I);if(s.isAjaxPagination(I)){J.preventDefault();return C}return B};h("#"+w+"_gallery_"+I+" div.pagination a").click(K)};o(x+" "+u,H)}());(function(){var G=function(L,K){var N=s.getSequence(K),J=s.getCurrentVideoId(K),I=h.inArray(J.toString(),N),M=N?N.length-1:I;if(I===-1||I===M){return}A(f,[K,N[I+1]])},H=function(L,K){var M=s.getSequence(K),J=s.getCurrentVideoId(K),I=h.inArray(J.toString(),M);if(I===-1||I===0){return}A(f,[K,M[I-1]])};o(q,G);o(k,H)}());(function(){var H=p.Logger,G=function(N,M,L,J,K){var I=s.findGalleryContainingVideoDomId(L);if(!I){return}if(s.isAutoNext(I)&&s.getSequence(I)){if(H.on()){H.log("Auto-starting next for gallery "+I)}F.publish(q,[I])}};F.subscribe(r,G)}());p.AsyncUtil.processQueueCalls("tubePressGalleryRegistrar",y);return{Registry:s}}(jQuery,window,TubePress));