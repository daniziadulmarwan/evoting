function deleteData(url) {
  Swal.fire({
      title: "Are you sure?",
      text: "You want to destroy this data!",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#1abc9c",
      cancelButtonColor: "#ed2b47",
      confirmButtonText: "Yes, delete it!",
  }).then((result) => {
    if (result.isConfirmed) {
      fetch(url, {
        headers: {
            "Content-type": "application/json",
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                "content"
            ),
        },
        method: "delete",
      })
      .then((res) => res.json())
      .then((data) => {
        if (data.status === "success") {
          console.log(data)
            Swal.fire({
                icon: "success",
                title: "Selamat!",
                text: data.msg,
                showConfirmButton: false,
                timer: 1500,
            });
            setTimeout(() => {
                window.location.reload();
            }, 1500);
        }
      });
    }
  });
}
