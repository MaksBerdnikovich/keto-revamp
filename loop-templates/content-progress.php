<?php
$progress = get_my_progress();
if ($progress):
    ?>
    <div class="row">
        <div class="col-md-6">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col">Date</th>
                    <th scope="col">Weight</th>
                    <th scope="col">Action</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($progress as $item): ?>
                    <tr>
                        <td><?php echo carbon_parse($item['date'])->format('Y-m-d') ?></td>
                        <td><?php echo $item['weight'] ?></td>
                        <td>
                            <form method="POST" action="<?php echo get_current_url() ?>">
                                <input type="hidden" name="action" value="delete">
                                <input type="hidden" name="id" value="<?php echo $item['id'] ?>">
                            <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php endif ?>
<div class="row">
    <div class="col-md-6">
        <form method="POST" action="<?php get_current_url() ?>">
            <input type="hidden" name="action" value="add">
            <div class="form-group">
                <label for="currentWeightInput">Enter your current weight</label>
                <input id="currentWeightInput" type="number" name="weight" required class="form-control"
                       placeholder="Your current weight">
            </div>
            <button type="submit" class="btn btn-primary">Save weight entry</button>
        </form>

    </div>
</div>
<div class="row">
    <div class="wrapper col-6">
        <canvas id="progress-chart"></canvas>
    </div>
</div>