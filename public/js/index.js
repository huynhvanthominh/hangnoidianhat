const setTitle = (title) => {
    document.title = `${title} - Hàng nội địa nhật`
}
const urlAjax = (ctl, act) => {
    return `ajax.php?ctl=${ctl}&act=${act}`;
}