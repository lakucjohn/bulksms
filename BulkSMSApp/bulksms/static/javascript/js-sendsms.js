
var btnAddRecepient = document.getElementsByClassName("btn-add-recipients")[0]
var addContactPopUp = document.getElementById("addContactPopUp");
var contactNumTxtField = document.getElementsByClassName("txt-field-contact-num")[0]
var contactUl = document.getElementsByClassName("ul-contacts")[0]
var contactSearchResults = document.getElementsByClassName("contact-search-results")[0]



function removeRecipient(childElement) {
    // remove recepient from recepient list
    childElement.parentElement.style.display = 'none'
};

btnAddRecepient.addEventListener("click", function () {
    if (contactNumTxtField.value) {

        contactUl.innerHTML+='<li class="recepient-li-item"> ' +contactNumTxtField.value+ '<span class="remove-contact" onclick="removeRecipient(this)"> &#8212;</span></li>'
        contactNumTxtField.value = ""
    }

});

function setRecipient (element) {
    contactNumTxtField.value = element.innerHTML
    contactSearchResults.style.display = 'none'
}
function searchContact(element) {
    // body...
    var contactSearchResults = document.getElementsByClassName("contact-search-results")[0]
    var ulReturnedRecipients = document.getElementsByClassName("ul-returned-recipients")[0]

    if (element.value !="") {

        var httpRequest = new XMLHttpRequest()
        httpRequest.onreadystatechange = function () {
            if (httpRequest.readyState == 4 && httpRequest.status == 200) {
                if (httpRequest.responseText != "") {
                    contactSearchResults.style.display = 'block'
                    if (httpRequest.responseText ) {
                        var httpRequestRes = httpRequest.responseText.split(",")
                        ulReturnedRecipients.innerHTML= ""
                        for (var i = 0; i < httpRequestRes.length-1; i++) {

                            ulReturnedRecipients.innerHTML+='<li class="li-returned-recepient" onclick="setRecipient(this)">'+httpRequestRes[i]+'</li>'


                        }


                    }

                }
                else {
                    ulReturnedRecipients.innerHTML =" "
                    contactSearchResults.style.display = 'none'
                }
            }

        };
        httpRequest.open("GET", "search_recepient.php?elementValue="+element.value ,true)
        httpRequest.send()
    }
    else {
        contactSearchResults.style.display = 'none'
        ulReturnedRecipients.innerHTML = ""
    }

}

