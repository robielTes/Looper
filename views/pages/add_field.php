<?php
$title = 'Exercice: test';
$color = 'yellow';
?>
<?php ob_start() ?>
<div class="flex flex-row">
    <div class="flex-1 px-2">
        <h1 class="text-4xl font-bold pb-4">Field</h1>
        <table class="w-full text-left">
            <tr class="border-b-2">
                <th>Label</th>
                <th>Value kind</th>
            </tr>
            <tr>
                <td>test</td>
                <td>single_line</td>
            </tr>
        </table>
        <form class="py-8">
            <input class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="Complete and be ready for answers">
        </form>
    </div>
    <div class="flex-1 px-2">
        <h1 class="text-4xl font-bold pb-4">New Field</h1>
        <label class="text-gray-700 text-xl">Label</label>
        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" id="label" name="label"><br><br>
        <label class="text-gray-700 text-xl">Value kind</label>
        <select class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="value-kind">
            <option value="single-line-text" selected>Single line text</option>
            <option value="list-of-single-lines">List of single lines</option>
            <option value="multi-line text">Multi-line text</option>
        </select>
        <form class="pt-8 content-end">
            <input class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="submit" value="Create Field">
        </form>
    </div>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('views/templates/template.php'); ?>