const setStorage = (nombre="root", objeto) => {
    localStorage.setItem(nombre, JSON.stringify(objeto));
    window.dispatchEvent(new Event('storage'));
}

const getStorage = (nombre="root")=>{
    return JSON.parse(localStorage.getItem(nombre));
}