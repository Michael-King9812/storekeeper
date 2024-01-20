/** General functions */
const getById = (div) => {
    return document.getElementById(div);
}

const setInnerHtml = (div, value) => {
    return getById(div).innerHTML = value;
}

const getInnerHtml = (div) => {
    return getById(div).innerHTML;
}

const setValue = (div, value) => {
    return getById(div).value = value;
}

const getValue = (div) => {
    return getById(div).value;
}

const setChecked = (div) => {
    return getById(div).checked = true;
}

const unsetChecked = (div) => {
    return getById(div).checked = false;
}

const setSelected = (div, optionId) => {
    const selectElement = getById(div);
    if (selectElement) {
        var optionElement = selectElement.querySelector('[value="' + optionId + '"]');

        if (optionElement) {
            optionElement.selected = true;
        } else {
            console.error('Option with ID ' + optionId + ' not found.');
        }
    } else {
        console.error('Select element with ID ' + div + ' not found.');
    }
}


const copyToClipboard = (inputField) => {

    const text = document.getElementById(inputField).innerText;

    // Check if navigator.clipboard is supported on the current browser
    if (!navigator.clipboard) {
      console.error('Clipboard functionality is not available.');
      return Promise.reject('Clipboard functionality is not available.');
    }
  
    return navigator.clipboard.writeText(text)
      .then(() => {
       alert('Copied to clipboard');
      })
      .catch(err => {
        console.error('Failed to copy text to clipboard', err);
        throw err;  
      });
};

const togglePasswordField = (inputField) => {
    let field = document.getElementById(inputField);
    if (field.type === 'password') {
        field.type = 'text';
    } else if (field.type === 'text') {
        field.type = 'password';
    }
}
  