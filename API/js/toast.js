const toastDeleteBtn = document.getElementById('toastDeleteBtn');
const toastDelete = document.getElementById('toastDelete');
if (toastDeleteBtn) {
    toastDeleteBtn.addEventListener('click', () => {
    const toast = new bootstrap.Toast(toastDelete);

    toast.show();
  });
};
