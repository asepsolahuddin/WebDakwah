<script type='text/javascript'>
  $(document).ready(function() {
    $('#cek_ustad').change(function(){
        const additionalField = $('#additional_field');
        let additionalText = '';
        additionalText += `
            <div id="spesialis-div" class="form-group">
                <input type="text" name="spesialis" class="form-control form-control-user" id="spesialis" placeholder="Spesialis"/>
            </div>`;
        additionalText += `
            <div id="prestasi-div" class="form-group">
                <input type="text" name="prestasi" class="form-control form-control-user" id="prestasi" placeholder="Prestasi"/>
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
        <div class="mb-3">
            <label class="font-weight-bold">KTP</label>
            <input type="file" class="form-control @error('ktp_path') is-invalid @enderror"  name='ktp path' id="ktp_path">  
            @error('cover_path')
            <div class="alert alert-danger mt-2">
                {{ $message }}
            </div>
            @enderror
        </div>`;

        if($(this).is(':checked')){
            //tambahin input
            additionalField.append(additionalText);

            //ubah action to register ustad
            $('#form-register').attr('action', '{{ route('registustad') }}');

        } else {
            //hapus input
            $('#ktp-div, #prestasi-div, #spesialis-div').remove();

            //ubah action to register user
            $('#form-register').attr('action', '{{ route('register') }}');
        }
    });
  });
</script>