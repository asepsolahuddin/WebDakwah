<script type='text/javascript'>
  $(document).ready(function() {
    $('#cek_ustad').change(function(){
        const additionalField = $('#additional_field');
        let additionalText = '';
        additionalText += `
            <div id="spesialis-div" class="form-group">
                <input type="text" name="spesialis" class="form-control form-control-user" id="spesialis" placeholder="Isi keahlian dibidang apa" required/>
            </div>`;
        additionalText += `
            <div id="prestasi-div" class="form-group">
                <input type="text" name="prestasi" class="form-control form-control-user" id="prestasi" placeholder="Prestasi" required/>
            </div>`;
        additionalText += `
            <div id="phone-div" class="form-group">
                <input type="text" class="form-control form-control-user" id="phone_number" name="phone_number" placeholder="Nomor Telepon" required/>
            </div>`;
        // additionalText += `
        //     <div class="mb-3">
        //       <input class="form-control" @error('ktp_path') is-invalid @enderror" type="file" >
        //       @error('ktp_path')
        //         <div class="alert alert-danger mt-2">
        //               {{ $message }}
        //         </div>
        //       @enderror
        //       </div>`;
        additionalText +=`
        <div id="ktp-div" class="form-group">
            <label class="font-weight-bold">KTP</label>
            <input type="file" class="form-control " name="ktp_path" id="ktp_path">  
        </div>`;
        additionalText +=`
        <div id="pp-div" class="form-group">
            <label class="font-weight-bold">Photo Profil</label>
            <input type="file" class="form-control " name="pp_path" id="pp_path">  
        </div>`;

        if($(this).is(':checked')){
            //tambahin input
            additionalField.append(additionalText);

            //ubah action to register ustad
            $('#form-register').attr('action', '{{ route('registustad') }}');

        } else {
            //hapus input
            $('#ktp-div, #prestasi-div, #spesialis-div, #phone-div, #pp-div').remove();

            //ubah action to register user
            $('#form-register').attr('action', '{{ route('register') }}');
        }
    });
  });
</script>