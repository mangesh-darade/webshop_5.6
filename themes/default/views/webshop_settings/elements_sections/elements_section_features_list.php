<div class="row">
    <div class="col-lg-12">            
            <table class="table table-bordered" >
                <tr>
                    <th>Features Title</th>
                    <th>Sub Title</th>
                    <th>Icon </th>
                    <th>Is Active </th>
                </tr>
                <?php
                if (is_array($features)) {

                    foreach ($features as $feature) {
                        ?>  
                        <tr>
                            <th>
                                
                                <input type="text" name="title[<?= $feature->id ?>]" value="<?= $feature->title ?>"  placeholder="<?= $feature->title ?>" class="form-control" maxlength="50" />
                            </th>
                            <th>
                                
                                <input type="text" name="subtitle[<?= $feature->id ?>]" value="<?= $feature->subtitle ?>"  placeholder="<?= $feature->subtitle ?>" class="form-control" maxlength="50" />
                            </th>
                            <th>
                                
                                <input type="text" name="icon[<?= $feature->id ?>]" value="<?= $feature->icon ?>"  placeholder="<?= $feature->icon ?>" class="form-control" maxlength="50" />
                            </th>
                            <td>
                                <?php
                                    $ckecked = $feature->is_active ? 'checked="checked" ' : '';
                                ?>
                                <input type="checkbox" <?= $ckecked ?> name="is_active[<?= $feature->id ?>]" value="1" class="form-control" />
                                        
                            </td>
                        </tr>
            <?php
                    }
                }
                ?>
            </table> 
        <h2>Section Preview</h2>
        <div>
            <img src="<?=base_url("assets/uploads/webshop/")?>feature_view.png" class="img img-responsive" alt="feature_view" />
        </div>
    </div>
</div>

