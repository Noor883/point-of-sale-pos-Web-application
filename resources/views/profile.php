

<h1>Create profile</h1>
<i class="bi bi-file-person-fill"></i>


    <form class="w-50 card-wrapper col-12 col-md-6 col-lg-5 gab-5" method="POST" action="/update/profile">

        <div class="cv-info-1">
            <div class="mb-3">

                <label for="fname" class="form-label"> UserName</label>
                <input type="text" class="form-control" value="<?=$data->item->username?>" id="fname" name="username">
                <input type="text" hidden class="form-control" value="<?=$data->item->id?>" id="fname" name="id">
            </div>
           
            <div class="mb-3">
                <label for="fname" class="form-label"> display name</label>
                <input type="text" class="form-control" value="<?=$data->item->display_name?>" id="fname" name="display_name">
            </div>
           

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" value="<?=$data->item->email?>" name="email">
            </div>
           
        </div>

        
        <div class="cv-info-5">
           
            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" class="form-control" id="photo" name="">
            </div>

            
         
            <button id="workingBtn" type="submit" class="btn btn-warning">update </button>
            </div> 

        </div>
    </form>
</div>




<script src="https://code.jquery.com/jquery-3.6.2.js" integrity="sha256-pkn2CUZmheSeyssYw3vMp1+xyub4m+e+QK4sQskvuo4=" crossorigin="anonymous"></script>
<script>
