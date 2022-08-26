const form = document.querySelector('form');
submitBtn = form.querySelector('.submitBtn button');

form.onsubmit = (e) => {
    e.preventDefault();
}
submitBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'includes/login.inc.php', true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                if (data === 'success') {
                    location.href = 'home.php' + '?login=success';
                    form.reset(form);
                } else {
                    Swal.fire({
                        title: "Error",
                        text: data,
                        icon: "error",
                        button: "Ok",
                        confirmButtonColor: "#f44336",
                        timer: 4000
                    });
                }
            } else {
                Swal.fire({
                    title: "Error",
                    text: "Something went wrong",
                    icon: "error",
                    button: "Ok",
                    confirmButtonColor: "#f44336",
                    timer: 400
                });
            }
        }
    }
    xhr.send(new FormData(form));
}