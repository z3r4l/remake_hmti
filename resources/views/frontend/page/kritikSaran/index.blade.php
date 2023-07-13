<x-client-layouts title="Hubungin Kami">
    <section class="container">
        <div class="row d-flex justify-content-center">
            <div class="contact-us d-flex justify-content-center">
                <img src="/frontend/img/contact_us.svg" class="img-contact-us" alt="">
            </div>
            <div class="card card-contact-us rounded w-50 bg-primary">

                <h3 class="text-center fw-bold fs-2 my-3 text-uppercase"><span>Hubungi Kami</span>
                </h3>
                <hr>
                <div class="alert alert-feedback d-none" role="alert">
                    Terima Kasih Anda Telah Menghubungin Kami
                </div>
                <form name="form-hubungin-kami" action="">
                    <div class="form-group d-inline">
                        <label class="col-3 mt-2" for="email">Email</label>
                        <input type="email" name="email" id="email" class="col-9 form-control">

                        <label class="col-3 mt-2" for="nama">Nama</label>
                        <input type="text" class="col-9 form-control" id="nama" name="nama">

                        <label class="col-3 mt-2" for="kategori">Kategori</label>
                        <select class="form-control" name="kategori" id="kategori">
                            <option class="text-muted" disabled selected style="display: none">---Pilihan---</option>
                            <option value="Kritik & Saran">Kritik & Saran</option>
                            <option value="Kerja Sama">Kerja Sama</option>
                        </select>
                        <label class="col-3 mt-2" for="pesan">Pesan</label>
                        <textarea class="col-9 form-control" id="pesan" name="pesan" id="" cols="30"
                            rows="10"></textarea>
                    </div>

                    <button type="submit" class="btn button-yellow my-3 btn-kirim">Submit</button>
                    <button class="btn button-yellow d-none btn-loading" type="button" disabled>
                        <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
                        Loading...
                    </button>
                </form>
            </div>
        </div>
        </div>
        </div>
    </section>

    <script>
        const scriptURL = 'https://script.google.com/macros/s/AKfycbyFdY-uDiqwSsR8wVdkiDeFP2jIxnZr2YS3sxaBiSyQi6JUlPvuvjcgzMbGH2zpnYuglA/exec'
        const form          = document.forms['form-hubungin-kami']
        const btnKirim      = document.querySelector('.btn-kirim');
        const btnLoading    = document.querySelector('.btn-loading');
        const alertFeedback = document.querySelector('.alert-feedback');
    
        form.addEventListener('submit', e => {
          e.preventDefault();
    
            btnLoading.classList.toggle('d-none');
            btnKirim.classList.toggle('d-none');

          fetch(scriptURL, { method: 'POST', body: new FormData(form)})
            .then(response => {
                btnLoading.classList.toggle('d-none');
                btnKirim.classList.toggle('d-none');
                alertFeedback.classList.toggle('d-none');
                form.reset();
                myFunction();
                console.log('Success!', response)
            })
            .catch(error => console.error('Error!', error.message))
        })

        function myFunction() {
            timeout = setTimeout(displayNone, 8000);
            }

        function displayNone() {
            alertFeedback.classList.toggle('d-none');
            }
    </script>
</x-client-layouts>