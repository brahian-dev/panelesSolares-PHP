function checksFrm(idFrm){var existe,frm="",arrNameChk=new Array,existe=exist_obj(idFrm),cont=0,chks="",json="",chkSelect="",chkNotSelect="",contNotSelect=0,contSelect=0;if(json="{ ",1==existe){frm=document.getElementById(idFrm);for(var i=0;i<frm.elements.length;i++)if("checkbox"==frm.elements[i].type&&(0==arrNameChk.length||arrNameChk.indexOf(frm.elements[i].name)<0)){arrNameChk[cont]=frm.elements[i].name,cont++,json+='"'+frm.elements[i].name+'":{',chkSelect='"chkSelect":[',chkNotSelect='"chkNotSelect":[',chks=document.getElementsByName(frm.elements[i].name);var arrChkSelect=new Array,arrChkNotSelect=new Array;contNotSelect=0,contSelect=0;for(var t=0;t<chks.length;t++)1==chks[t].checked?(arrChkSelect[contSelect]='"'+chks[t].value+'"',contSelect++):(arrChkNotSelect[contNotSelect]='"'+chks[t].value+'"',contNotSelect++);chkSelect+=arrChkSelect.toString()+"],",chkNotSelect+=arrChkNotSelect.toString()+"]",json+=chkSelect,json+=chkNotSelect,json+="},"}json=json.substring(0,json.length-1)}return json+="}",json=JSON.stringify(eval("("+json+")"))}function showWarnings(e){"undefined"!=typeof Android?Android.showWarning(e):alert(e)}function showSuccess(e,t){"undefined"!=typeof Android?Android.showSuccess(e,t):alert(e)}function deviceInactive(e){"undefined"!=typeof Android?Android.deviceInactive(e):alert(e)}function validateConnectionToPrint(){var e=!1;return"undefined"!=typeof Android&&(e=Boolean(Android.validateConnectionToPrint())),e}function notificacion(e,t,n,a){showWarnings(t)}function alertErrorBd(e){showWarnings(e)}function ValidarCampo(e,t){switch(t){case"numero":return tecla=document.all?e.keyCode:e.which,241!=tecla&&(0==tecla||8==tecla||(patron=/[[0-9]/,tecla_final=String.fromCharCode(tecla),patron.test(tecla_final)));case"texto":return tecla=document.all?e.keyCode:e.which,241!=tecla&&(0==tecla||8==tecla||(patron=/[A-Za-z]/,tecla_final=String.fromCharCode(tecla),patron.test(tecla_final)));case"alfanumerico":return tecla=document.all?e.keyCode:e.which,241!=tecla&&(0==tecla||8==tecla||(patron=/[a-zA-Z0-9]/,tecla_final=String.fromCharCode(tecla),patron.test(tecla_final)));case"alfanumericoEsp":return tecla=document.all?e.keyCode:e.which,241!=tecla&&(0==tecla||8==tecla||32==tecla||(patron=/[a-zA-Z0-9]/,tecla_final=String.fromCharCode(tecla),patron.test(tecla_final)));case"email":re=/^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,3})$/,re.exec(e)||alert("Correo invalido !!");break;case"textoEsp":return tecla=document.all?e.keyCode:e.which,241!=tecla&&(0==tecla||8==tecla||32==tecla||(patron=/[A-Za-z]/,tecla_final=String.fromCharCode(tecla),patron.test(tecla_final)));case"numEsp":return tecla=document.all?e.keyCode:e.which,241!=tecla&&(0==tecla||8==tecla||32==tecla||(patron=/[a-zA-Z0-9]/,tecla_final=String.fromCharCode(tecla),patron.test(tecla_final)));case"numDecimal":return tecla=document.all?e.keyCode:e.which,241!=tecla&&(0==tecla||8==tecla||46==tecla||(patron=/[[0-9]/,tecla_final=String.fromCharCode(tecla),patron.test(tecla_final)))}}function hide_div(e){var t;t=exist_obj(e),1==t&&(d=document.getElementById(e),d.style.display="none")}function show_div(e){var t;t=exist_obj(e),1==t&&(d=document.getElementById(e),d.style.display="")}function hide_show_div(e){var t;t=exist_obj(e),1==t&&(d=document.getElementById(e),"none"==d.style.display?d.style.display="":d.style.display="none")}function exist_obj(e){return null!=document.getElementById(e)}function number_format(e,t,n,a){var c=e,r=t,l=n,o=a;c=isFinite(+c)?+c:0,r=isFinite(+r)?Math.abs(r):0,o=void 0==o?",":o;var i,s,d=c.toFixed(r),m=Math.abs(c).toFixed(r);return m>1e3?(i=m.split(/\D/),s=i[0].length%3||3,i[0]=d.slice(0,s+(0>c))+i[0].slice(s).replace(/(\d{3})/g,o+"$1"),d=i.join(l||".")):d=m.replace(".",n),d}function validate(e){var t="",n="",a=!1;for(var c in e)n=document.getElementById(c).value,n?(a=_validate(n,e[c].tipo),a||(t+=(t?", ":"")+e[c].nombre)):e[c].necesario&&(t+=(t?", ":"")+e[c].nombre);return!t||(document.getElementById("dvContentAlert").innerHTML="Debe completar los campos: "+t,$("#modalAlert").modal("open"),!1)}function _validate(e,t){var n=/^(\d{4})-([0][1-9]|[1][0-2])-([0][1-9]|[1-2]\d|[3][0-1])$/,a=/^\d+$/,c=/^\d+$/,r=/^\d+$/,l=/^\d+$/,o=/^[a-z]+@[a-z]+\.[a-z]{2,4}$/,i=/^[A-Za-z]$/,s=/^[A-Z a-z]$/;switch(t){case"fecha":return n.test(e);case"numeros":return a.test(e);case"texto":return i.test(e);case"texto_espacio":return s.test(e);case"email":return o.test(e);case"celular":return 10==e.length&&c.test(e);case"cedula":return e.length>5&&r.test(e);case"telefono":return 7==e.length&&l.test(e);default:if(!e||0==e)return!1}return!0}var idUser=0;