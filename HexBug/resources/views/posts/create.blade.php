@extends('layouts.app')
@section('content')
@if(isset($exception))
<div class="error">
    {{ $exception }} error
</div>
@endif
<form method="post" action="{{ route('createblogdb') }}" class="mx-4 mt-4" enctype="multipart/form-data">
    @csrf
    <!-- 2 column grid layout with text inputs for the first and last names -->
    <div class="row mb-4">
        <div class="col">
            <div class="form-outline">
                <input type="text" id="form6Example1" class="form-control" name="post_title" />
                <label class="form-label" for="form6Example1">Title</label>
            </div>
        </div>
        <div class="col">
            <div class="form-outline">
                <input type="text" id="form6Example2" class="form-control" name="post_content" />
                <label class="form-label" for="form6Example2">Content's</label>
            </div>
        </div>
    </div>

    <div class="row mb-4" id="imagerow">
    </div>
    <div class="row mb-4">
        <div class="col-md-2">
            <button type="button" id="add_image_form" class="btn" onclick="ImageForm()">Add Images</button>
        </div>
    </div>
    <div class="form-outline mb-4 w-50">
            <input type="text" id="input_tags" class="form-control"  autocomplete/>
            <label class="form-label" for="input_tags">Tag's</label> 
    </div>

    <div class="tagdiv" id="tagdiv" style="height: 100px; width: 400px; border: none;">

    </div>

    <!-- Text input -->
    <div class="form-outline mb-4">
        <textarea class="form-control" id="textAreaExample1" rows="4" name="post_desc"></textarea>
        <label class="form-label" for="textAreaExample">Description</label>
    </div>
    <input type="hidden"name="tags" id="tagcontainer">
    <!-- Images  -->
    <!-- <input type="file" name="images[]" id="images" multiple>
    <input type="text" name="image_descriptions[]" id="image_descriptions"> -->
    <!-- images input here  -->


    <!-- Submit button -->
    <button type="submit" class="btn btn-primary btn-block mb-4 w-25">Create Blog</button>
</form>





<script>
    let counter = 0;

    function ImageForm() {
        const mainrow = document.createElement('div');
        mainrow.classList.add('row', 'mb-4' , 'mt-4');

        const fcol = document.createElement('div');
        fcol.classList.add('col');
        const scol = document.createElement('div');
        scol.classList.add('col');

        const foutline = document.createElement('div');
        foutline.classList.add('form-outline');
        const soutline = document.createElement('div');
        soutline.classList.add('form-outline');

        const fileInput = document.createElement('input');
        fileInput.type = 'file';
        fileInput.classList.add('form-control', 'imagesclasses');
        fileInput.name = 'image' + counter; // Use "images[]" to make it an array
        fileInput.id = 'image' + counter;

        const descinput = document.createElement('input');
        descinput.type = 'text';
        descinput.classList.add('form-control', 'descs');
        descinput.id = 'desc' + counter;
        descinput.name = 'image_desc' + counter;
        
        // descinput.name = 'descriptions[]'; // Use "descriptions[]" to make it an array

        const desclabel = document.createElement('label');
        desclabel.classList.add('add_image_form');

        foutline.appendChild(fileInput);
        fcol.appendChild(foutline);

        soutline.appendChild(descinput, desclabel);
        scol.appendChild(soutline);

        mainrow.appendChild(fcol);
        mainrow.appendChild(scol);

        document.getElementById('imagerow').appendChild(mainrow);
        counter += 1;

        // document.querySelectorAll('.descs').forEach((elem) => {
        //     elem.addEventListener('change', (eiusmod) => {
        //         val = document.querySelector('#'+eiusmod.target.id).value
        //         let existingData = document.getElementById('image_descriptions').value;
        //         let exiArr = existingData.split(',');
        //         exiArr[eiusmod.target.id.split('desc')[1]] = val;
        //         document.getElementById('image_descriptions').value=exiArr.join(',');
        //     })
        // })
        // document.querySelectorAll('.imagesclasses').forEach(function (input) {
        //     input.addEventListener('change', (data) => {
        //         getVals=document.getElementById('images').value
        //         let exisVals = getVals.split(',')
        //         exisVals[data.target.id.split('image')[1]]=data.target.files[0].name;
        //         document.getElementById('images').value = exisVals.join(',')
        //     })
        // });
    }

    let tagInput = document.getElementById("input_tags");
    let tagcontainer = document.getElementById("tagcontainer");
    let tagdiv = document.getElementById("tagdiv");
    let  tags = [];
    tagInput.addEventListener('keydown' , (event)=>{
        if (event.key === 'Enter' || event.keyCode === 13) {
        event.preventDefault(); // Prevent form submission on Enter press
        const tagText = tagInput.value.trim();

            badgediv = document.createElement('div');
            badgediv.classList.add('badge', 'badge-primary', 'p-3', 'rounded-4', 'px-4');
            badgediv.innerHTML = `<i class="fas fa-chart-pie"></i>`;
            badgediv.innerHTML = tagText;
            tagdiv.appendChild(badgediv);


            tagInput.value=''

            tags.push(tagText);
            const tagstring = tags.join(',');
            tagcontainer.value = tagstring;

    }
});
// tagContainer.addEventListener('click', function(event) {
//     if (event.target.classList.contains('tag')) {
//         const tagText = event.target.textContent;
//         event.target.remove();
//         const index = tags.indexOf(tagText);
//         if (index !== -1) {
//             tags.splice(index, 1);
//         }
//     }
// });
    
</script>

@endsection