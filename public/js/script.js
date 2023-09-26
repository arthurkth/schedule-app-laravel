(() => {
    const modal = document.querySelector(".modal");
    const buttonCloseModal = document.querySelector(".modal__button--close");
    const buttonConfirmModal = document.querySelector(
        ".modal__button--confirm"
    );
    const buttonCancelModal = document.querySelector(".modal__button--cancel");
    const tableButtonDelete = document.querySelectorAll(
        ".table__button--delete"
    );

    let contactId;

    const openModal = () => {
        modal.style.display = "flex";
    };

    const closeModal = () => {
        modal.style.display = "none";
    };

    const confirmDelete = async (e) => {
        const csrfToken = document.querySelector(
            'meta[name="csrf-token"]'
        ).content;
        const res = await fetch(`contacts/${contactId}`, {
            method: "DELETE",
            headers: {
                "X-CSRF-TOKEN": csrfToken,
            },
        });

        console.log(res);
        window.location = "/contacts";
    };

    tableButtonDelete.forEach((btn) =>
        btn.addEventListener("click", (e) => {
            contactId = e.target.dataset.id;
            e.preventDefault();
            openModal();
        })
    );

    buttonConfirmModal.addEventListener("click", confirmDelete);

    buttonCloseModal.addEventListener("click", closeModal);

    buttonCancelModal.addEventListener("click", closeModal);
})();
