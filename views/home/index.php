
<div class="text-center" style="padding-top: 50px; width: 100%; text-align: center">

    <h1 class="display-4">Welcome</h1>
    <p>Please add student data</p>
    <hr class="my-4">
    <form class="form-inline" method="post" action="<?php echo ROOT_URL; ?>home/addStudent">
        <p> Board:
            <select name="board"  class="custom-select">
                <option value="csm">CSM</option>
                <option value="csmb">CSMB</option>
            </select>
        </p>
       <p>
           Name : <input type="text" name="name" required>
       </p>
        <p>
            Grade 1 : <input type="number" name="grade1" min="1" max="10" required>
        </p>
        <p>
            Grade 2 : <input type="number" name="grade2" min="1" max="10">
        </p>
        <p>
            Grade 3 : <input type="number" name="grade3" min="1" max="10">
        </p>
        <p>
            Grade 4 : <input type="number" name="grade4" min="1" max="10">
        </p>
        <input class="btn btn-primary" name="submit" type="submit" value="Submit" />
    </form>
</div>

<?php if (count($viewmodel)) : ?>
<hr>
<h2>Students:</h2>
<div class="row">
    <table class="table">
        <tr>
            <th>Board</th>
            <th>Name</th>
            <th>Link</th>
        </tr>
        <?php foreach ($viewmodel as $student) : ?>
            <tr>
                <td><?php echo $student['board']; ?></td>
                <td><?php echo $student['name']; ?></td>
                <td><a href="<?php echo ROOT_URL . 'home/student/' . $student['id'] ?>">link</a></td>
            </tr>
        <?php endforeach; ?>
    </table>
</div>
<?php endif ?>