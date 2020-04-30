<?php
$title = "Bienvenue sur ICC-2020 Web Project";
ob_start();
?>

<section>
    <h1 class="text-center">Descriptif du site</h1>

    <p class="text-justify">
        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dolor mi, lobortis eget nisl quis, hendrerit laoreet risus. Aliquam vel egestas leo, sed varius odio. Integer elementum nibh nec arcu luctus mollis. Pellentesque luctus eu diam eu dapibus. Vivamus tempus blandit pharetra. Etiam sagittis velit est, in efficitur felis dignissim eget. Pellentesque porta lectus risus, quis ultrices orci ullamcorper in.
        <br />
        <br />
        Integer viverra ultricies nibh, id condimentum leo pretium vitae. Fusce laoreet placerat magna, efficitur pretium massa auctor eget. Aliquam mauris augue, maximus et pretium a, finibus vel nisl. Donec aliquam nec dolor a eleifend. Ut convallis, eros sed efficitur placerat, est velit faucibus urna, ut suscipit elit tortor in sem. Phasellus ante tellus, interdum vel placerat at, mollis vitae ante. Donec ut semper turpis. Morbi venenatis egestas metus sit amet imperdiet. Vivamus volutpat elementum enim. Aliquam tempus vitae nisl dapibus aliquam.
        <br />
        <br />
        Duis ultricies accumsan nunc, sed hendrerit nulla pharetra nec. Mauris accumsan erat ac auctor ullamcorper. In cursus mattis lectus sed tristique. Ut pretium et erat et scelerisque. Sed at libero velit. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec rutrum eros id lobortis ultricies. Mauris consequat ac risus nec interdum. Vivamus eget mattis quam. Suspendisse potenti. Integer eleifend vestibulum nisl, id elementum orci rutrum id.
        <br />
        <br />
        Sed ut ante a est dignissim laoreet. In nisl ligula, ullamcorper nec volutpat sed, dignissim vitae ipsum. Proin quis tempus ligula. Sed congue sed est sed porta. Maecenas vestibulum libero nec risus blandit, vitae tempus nisl hendrerit. Aliquam condimentum tristique felis at ornare. Etiam vitae fermentum neque. Etiam id efficitur dui. Morbi odio quam, placerat mollis venenatis condimentum, porta facilisis lectus. Nulla facilisi. Donec mi lorem, accumsan vel risus ut, pharetra efficitur nibh. Duis ultricies dolor eu felis mattis blandit. Nam volutpat urna quis est pretium, ut pulvinar tellus ullamcorper.
        <br />
        <br />
        Ut magna lectus, condimentum vitae risus efficitur, cursus lacinia odio. Phasellus finibus mauris in nulla pulvinar, sit amet accumsan magna lacinia. Morbi lobortis lacus nec nisl consectetur, ut consectetur ex interdum. Vestibulum sed tincidunt magna. In hac habitasse platea dictumst. Cras vitae quam sit amet ex placerat sollicitudin id sed massa. Nullam non mattis ipsum. Fusce vehicula, diam non consectetur faucibus, nibh mauris facilisis turpis, id semper eros nisi sit amet felis. Vestibulum eget nisi elementum, suscipit mi a, sollicitudin erat. Sed dignissim justo dui, non ultricies nisi mollis quis. Vivamus quis lorem mollis, sollicitudin purus non, auctor nulla. Aenean finibus auctor varius. Cras congue leo non lobortis pellentesque. Cras non volutpat erat. Morbi nec quam ullamcorper, fringilla metus eget, mattis ligula. 
    </p>
</section>

<?php
$main_section = ob_get_clean();

require('base.php');
?>