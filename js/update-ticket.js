const form = document.querySelector('form');
submitBtn = form.querySelector('.submitBtn button');

form.onsubmit = (e) => {
    e.preventDefault();
}
submitBtn.onclick = () => {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'includes/update-ticket.inc.php', true);
    xhr.onload = () => {
        if(xhr.readyState === XMLHttpRequest.DONE) {
            if(xhr.status === 200) {
                let data = xhr.response;
                if (data === 'success') {
                    console.log(data);
                    // location.href = 'home.php' + '?update=success';
                } else {
                    Swal.fire({
                        title: "Error",
                        text: data,
                        icon: "error",
                        button: "Ok",
                        confirmButtonColor: "#f44336",
                        timer: 4000000
                    });
                }
            } else {
                Swal.fire({
                    title: "Error",
                    text: "Something went wrong",
                    icon: "error",
                    button: "Ok",
                    confirmButtonColor: "#f44336",
                    timer: 4000000
                });
            }
        }
    }
    xhr.send(new FormData(form));
}