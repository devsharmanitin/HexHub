@extends('layouts.app')
@section('content')


<style>
    .author .author-content {
        color: rgb(209, 65, 202);
        justify-content: space-between;
    }

    .author .author-content,
    .author .author-content .author-profile-body {
        align-items: center;
        display: flex;
    }

    div {
        display: block;
    }

    .author .author-content .author-profile-body .author-img img {
        border-radius: 50%;
        cursor: pointer;
        height: 55px;
        width: 55px;
    }

    img,
    svg {
        vertical-align: middle;
    }

    img {
        overflow-clip-margin: content-box;
        overflow: clip;
    }

    .author .author-content .author-profile-body .author-profile span {
        font-size: 13px;
        font-weight: 900;
        color: #1e1e1f;
    }

    .px-3 {
        padding-left: 1rem !important;
        padding-right: 1rem !important;

    }

    .text-muted {
        color: #6c757d !important;
    }

    .author .author-social-media a {

        cursor: pointer;
        font-size: 16px;
        transition: .4s ease-in-out;
    }

    a {
        color: #1e1e1f;
        padding: 0;
        margin: 0;
    }

    .all-blogs-structure .content {

        display: flex;
        justify-content: space-between;
        padding-top: 2rem;
    }



    h5 {
        display: block;
        font-size: 1.5em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
        font-weight: 900;
        color: rgb(44, 44, 44);

    }

    p {
        margin-bottom: 1rem;
        margin-top: 0;
    }

    element.style {
        font-weight: 400;
        font-size: 14px;
    }

    p {
        display: block;
        margin-block-start: 0.5em;
        margin-block-end: 1em;
        margin-inline-start: 0px;
        margin-inline-end: 0px;
    }

    .all-blogs-structure .content img {
        margin-left: 5rem;
        width: 150px;
        height: 150px;
        object-fit: cover;
    }

    .all-blogs-structure .content {
        display: flex;
        justify-content: space-between;
        padding-top: 2rem;
    }

    .m-1 {
        margin: 0.25rem !important;
    }


    .all-blogs-structure {
        max-width: 700px;
    }

    .blog-common-detail {
        align-items: center;
        display: flex;
        justify-content: space-between;
    }

    .px-2 {
        padding-left: 0.5rem !important;
        padding-right: 0.5rem !important;
    }

    .my-3 {
        margin-bottom: 1rem !important;
        margin-top: 1rem !important;
    }

    ion-icon {
        font-size: 18px;
        /* Adjust the size as needed */
        color: black;
        padding-left: 5px;
    }

    .share-option ion-icon {
        font-size: 20px;
        /* Adjust the size as needed */
        color: black;
        font-weight: 1000;

    }

    a:hover {
        color: black;
    }

    .details ion-icon {
        color: #6c757d;
    }

    .nav_img {
        height: 30px;
        width: 30px;
        border-radius: 50%;
        object-fit: cover;
    }

    .list {
        width: 70%;
    }

    .itemcount {
        width: 30%;
    }

    .listitem {
        margin: 0;
    }

    .varcount {
        height: 30px;
        width: 30px;
        border-radius: 50%;
        object-fit: cover;
        background-color: rgb(24, 94, 197);
        text-align: center;
        color: white;
    }

    .tagbtn {
        background: transparent;
        border: none;
        height: none;
        width: none;
        text-align: center;
    }
</style>

@if(isset($exception))
<div class="error">
    {{ $exception }} error
</div>
@endif


<div class="row">
    <div class="col-5">
        <div class="all-blogs-structure mb-5 mt-5 p-3">
            <div class="author">
                <div class="author-content">
                    <div class="author-profile-body">
                        <div class="author-img  px-2">
                            <img src="https://images.unsplash.com/photo-1697974375586-24a83dbbbde9?auto=format&fit=crop&q=80&w=1374&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                        </div>

                        <div class="author-profile  px-4">
                            <a href="#"> <span class="px-3">{{ auth()->user()->name }}</span></a>
                            <br>
                            <span class="px-3 text-muted"> {{ auth()->user()->status}} </span>
                        </div>
                    </div>
                    <div class="author-social-media">
                        <a href=""><ion-icon name="logo-github"></ion-icon></a>
                        <a href=""><ion-icon name="logo-facebook"></ion-icon></a>
                        <a href=""><ion-icon name="logo-instagram"></ion-icon></a>
                    </div>
                </div>
            </div>
            <a href="">
                <div class="content">
                    <div class="main-content">
                        <h5 style="font-weight: 700;" id="HeadingTitle">xxx</h5>
                        <p style="font-weight: 600; font-size: 14px; color: rgb(90, 89, 89);" id="Desc">xxxxxxxx</p>
                    </div>
                    <div class="img">
                        <img src="https://images.unsplash.com/photo-1697974375586-24a83dbbbde9?auto=format&fit=crop&q=80&w=1374&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D">
                    </div>
                </div>

                <span class="badge m-1" style="background: whitesmoke;  font-size: 14px; font-weight: 700; color: #6c757d;  border: 1.5px solid rgb(56, 56, 56);"><a class="" href="/tag/Django" id="tagss" style="text-decoration: none; color: black;"></a></span>


            </a>
            <div class="blog-common-detail my-3 px-2">
                <div class="details">


                    <span class="px-1 text-muted"><ion-icon name="timer-outline"></ion-icon> &nbsp; 12:58:13 PM </span>




                </div>
                <div class="share-option ">
                    <a href=""><ion-icon name="logo-facebook"></ion-icon></a>
                    <a href=""><ion-icon name="link-outline"></ion-icon></a>
                    <a href=""><ion-icon name="logo-instagram"></ion-icon></a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-7">
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
                <input type="text" id="input_tags" class="form-control" autocomplete />
                <label class="form-label" for="input_tags">Tag's</label>
            </div>

            <div class="tagdiv" id="tagdiv" style="height: 100px; width: 400px; border: none; ">

            </div>

            <!-- Text input -->
            <div class="form-outline mb-4">
                <textarea class="form-control" id="textAreaExample1Desc" rows="4" name="post_desc"></textarea>
                <label class="form-label" for="textAreaExample">Description</label>
            </div>
            <input type="hidden" name="tags" id="tagcontainer">
            <!-- Images  -->
            <!-- <input type="file" name="images[]" id="images" multiple>
            <input type="text" name="image_descriptions[]" id="image_descriptions"> -->
            <!-- images input here  -->

            <!-- Submit button -->
            <button type="submit" class="btn btn-primary btn-block mb-4 w-25">Create Blog</button>
        </form>
    </div>
</div>






<script>
    let counter = 0;

    function ImageForm() {
        const mainrow = document.createElement('div');
        mainrow.classList.add('row', 'mb-4', 'mt-4');

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
    let tagss = document.getElementById("tagss");
    let tagdiv = document.getElementById("tagdiv");
    let tags = [];
    tagInput.addEventListener('keydown', (event) => {
        if (event.key === 'Enter' || event.keyCode === 13) {
            event.preventDefault(); // Prevent form submission on Enter press
            const tagText = tagInput.value.trim();

            badgediv = document.createElement('div');
            badgediv.classList.add('badge', 'badge-primary', 'p-3', 'rounded-4', 'px-4');
            badgediv.innerHTML = `<i class="fas fa-chart-pie"></i>`;
            badgediv.innerHTML = tagText;

            tagdiv.appendChild(badgediv);


            tagss.append(badgediv);


            tagInput.value = ''

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

    // title 
    document.getElementById('form6Example1Title').addEventListener('keyup', (event) => {
        // Assuming 'HeadingTitle' is an input element, not an array
        let HeadingTitle = document.getElementById('HeadingTitle');
        // Use += to concatenate the values
        if (HeadingTitle.value != "undefined") {
            HeadingTitle.innerHTML = event.target.value;
        } else {

            HeadingTitle.innerHTML = HeadingTitle.value + event.target.value;
        }
    });
    // Desc 
    document.getElementById('textAreaExample1Desc').addEventListener('keyup', (event) => {
        // Assuming 'HeadingTitle' is an input element, not an array
        let HeadingTitle = document.getElementById('Desc');
        // Use += to concatenate the values
        if (HeadingTitle.value != "undefined") {
            HeadingTitle.innerHTML = event.target.value;
        } else {

            HeadingTitle.innerHTML = HeadingTitle.value + event.target.value;
        }
    });
</script>


@endsection