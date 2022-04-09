const setTitle = (title) => {
    document.title = `${title} - Hàng nội địa nhật`
}
const urlAjax = (ctl, act, value = null) => {
    return `ajax.php?ctl=${ctl}&act=${act}${value != null ? "&pr=" + value : ""}`;
}