
function searchContact(Element) {
    var searchValue = Element.value
    var contactsDataTr = document.getElementsByClassName("contacts-data-tr")

    if (searchValue.toLowerCase().length >= 1) {
        for (var i = 0; i < contactsDataTr.length; i++) {
            if (contactsDataTr[i].innerHTML.toLowerCase().indexOf(searchValue) > -1 ){
                contactsDataTr[i].style.display = ""


            }
            else {
                contactsDataTr[i].style.display = "none"

            }

        }
    }
    else {
        for (var i = 0; i < contactsDataTr.length; i++) {
            contactsDataTr[i].style.display = ""
        }

    }
}
function toggleTxtField(element, checkBoxId) {
    var checkBoxValueId = checkBoxId
    var ValueTxtBoxes = document.getElementsByClassName("txt-field-choose-tbl")

    if (element.checked) {
        ValueTxtBoxes[checkBoxValueId].style.visibility = 'visible'
        // alert(hiddenRecordIdField.value)
    }
    else {
        ValueTxtBoxes[checkBoxValueId].style.visibility = 'hidden'
    }


}
function cancel () {
    document.execCommand('Stop')
}

