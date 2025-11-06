<?php

$theme_colors = [
    'primary'   => 'Primary',
    'secondary' => 'Secondary',
    'info'      => 'Info',
    'success'   => 'Success',
    'warning'   => 'Warning',
    'danger'    => 'Danger',
    'dark'      => 'Dark',
    'light'     => 'Light',
    'black'     => 'Black',
    'white'     => 'White',
]

?>

<section class="py-5">
    <h2>Colours</h2>
    <div class="row">
        <?php foreach ( $theme_colors as $color => $title ) { ?>
            <div class="col-md-2">
                <div style="height: 100px; display: flex; flex-direction: column; align-items: center; justify-content: center; margin-bottom: 10px;" class="text-light bg-<?php echo $color; ?>">
                    <?php echo $title; ?>
                </div>
            </div>
        <?php } ?>
    </div>
</section>

<section class="py-5">
    <h2>Typography</h2>

    <div class="row">
        <div class="col-md-6">
            <div>
                h1
                <h1 class="h1">Headline</h1>
            </div>
            <div>
                h2
                <h1 class="h2">Headline</h1>
            </div>
            <div>
                h3
                <h1 class="h3">Headline</h1>
            </div>
            <div>
                h4
                <h1 class="h4">Headline</h1>
            </div>
            <div>
                h5
                <h1 class="h5">Headline</h1>
            </div>
            <div>
                h6
                <h1 class="h6">Headline</h1>
            </div>
        </div>
        <div class="col-md-6">
            <div>
                <div class="mb-3">Paragraph</div>
                <p>Lorem ipsum, <a href="#">link</a> dolor sit amet consectetur adipisicing elit. Facilis aut dicta quo nobis omnis quae sed dignissimos! Iste tenetur, corporis voluptates ad vitae eligendi explicabo, impedit facere harum repellat quo.</p>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div>
                        <div class="mb-3">List</div>
                        <ol>
                            <li>List item</li>
                            <li>List item</li>
                            <li>List item
                                <ol>
                                    <li>List item</li>
                                    <li>List item</li>
                                    <li>List item</li>
                                    <li>List item</li>
                                </ol>
                            </li>
                        </ol>
                    </div>
                </div>
                <div class="col-md-6">
                    <div>
                        <div class="mb-3">List</div>
                        <ul>
                            <li>List item</li>
                            <li>List item</li>
                            <li>List item
                                <ul>
                                    <li>List item</li>
                                    <li>List item</li>
                                    <li>List item</li>
                                    <li>List item</li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php // Buttons ?>
<section class="py-5">
    <h2>Buttons</h2>

    <div class="row py-2">
       
            <div class="col-md-2 mb-3">
                <a href="#" class="btn btn-lg btn-block btn-outline-warning">
                    <?php echo 'Danger'; ?>
                </a>
            </div>

            <div class="col-md-2 mb-3">
                <a href="#" class="btn btn-block btn-text-warning btn-white btn-lg">
                    <?php echo 'Button'; ?>
                </a>
            </div>

            
            <div class="col-md-3 mb-3">
                <a href="#" class="btn btn-arrow" style= "text-decoration: underline">Button title</a>
            </div>
    </div>

    <div class="row py-2 align-items-center text-center">
        <div class="col-md-2">
            <a href="#" class="btn btn-sm btn-warning">
                Small
            </a>
        </div>
        <div class="col-md-2">
            <a href="#" class="btn btn btn-warning">
                Normal
            </a>
        </div>
        <div class="col-md-2">
            <a href="#" class="btn btn-lg btn-warning">
                Large
            </a>
        </div>
    </div>
</section>

<section class="py-5">
    <h2>Badges</h2>

    <div class="badge badge-secondary">Category</div>
    <div class="badge badge-warning">Category</div>
    <div class="badge badge-danger">Category</div>
</section>

<section class="py-5">
    <h2>Forms</h2>

    <div class="p-2 bg-primary">
        <?php echo do_shortcode( '[wpforms title="true" id="167"]' ); ?>
    </div>

    <div class="p-2 bg-white form-outline">
        <?php echo do_shortcode( '[wpforms id="166"]' ); ?>
    </div>

</section>
            
<section class="py-5">
    <h2>Icons</h2>

    <div class="row py-2">
     
        <div class="col-md-2 mb-3 svg__phone">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="14" height="20" viewBox="0 0 14 20"><g><g><image width="14" height="20" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAA4AAAAUCAYAAAC9BQwsAAABI0lEQVQ4T43TsStHURTA8c/PIKuZRRkkA4sMjIpikFUxsSg2WUwG6bfIgkEyS1GykuIPkJFSViNRv9DJe7q93u/3nOXWvd/vveeee27Nb/SjjnFcYRKNbK10qGEY1+hIiFmcVol7WCpAW1ivEh+yVFNuB6tV4ifaC9A21qrE7wLwhTHcVonpiS9YxGUrKdaiqk/oycBjzFdJuRhln8ngKNTAf8Vl7CZwLx6r5Ei1G89oy+DKiuapxniO6Ux8Qx+iUE0jTowYwV1CXWQbFZ/qD8nFmDhB9GgeLVNOxS7cozORo/VesZLNHWAT76kYa1M4SwpVdsd4somiGGD8lPgxreKmTAxhAfslzZ9v1mgmBjCIQwyVHF1vJebvHO04h1F8YANHP8BuMHk7wfYvAAAAAElFTkSuQmCC"/></g></g></svg>
        </div>

        <div class="col-md-2 mb-3 svg__search">
            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18" height="18" viewBox="0 0 18 18"><g><g><image width="18" height="18" xlink:href="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABIAAAASCAYAAABWzo5XAAABo0lEQVQ4T6XTT2jPcRzH8cfCboSD29pByIhYOexgraSwPy1RUuTggFJO4iClsZODHJwUrSWtpVZsLX8Sx+3gX0kOCDnZgRCr9db7q0/8+P3K5/L99n6/P8/3v9enyZ9nAw5iK1owD+9xH1cxUeOOpsK4EBexr1ZgYbuL/XhTxlWgRZjEpnR+xTim8AOr0YMl6X+LTrysYBVoGHvSeCtbi+DyRLJzOJzGx9iYiX621oGH6RxDP2b/0d5ZnEj/IVyK/wBdxgF8xnJ8qDOj+XiCVZhGewV6ndu5VrRXh+UkBjJoKT5GRTHMWHGUO1iPkP5tuJn/a/E0QN/QjFM40yCoDzcydg2eBeg5VmaGHQ2CovLjuZTF+BSg8ziWxnVBrwMLGbzAMtxDVzXsFdEjFuBRCm3mL7DY2PWUSITsxGgFim+pjch2JJVe8tbjAjan8Ta2/K7s2NoV7C1uvkqdfEcbYjvl+YJu3Ckrqv6P4jRigLVOSCVa25Wj+AUrX391MSARGGW3pjTe5TMaylffi5GEhXx21wI1qAAl7MH/gCJhzChexPY5ClRSM8efoxYAAAAASUVORK5CYII="/></g></g></svg>
        </div>

    </div>

</section>
