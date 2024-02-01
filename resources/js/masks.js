import * as VMasker from 'vanilla-masker';
import * as bootstrap from "bootstrap";

document.addEventListener("DOMContentLoaded", function(){
    // Mask contact numbers
    if(document.querySelector("[mask=contact]")){
        VMasker(document.querySelector("[mask=contact]")).maskPattern("999 999 999");
    }
});
