<div class="row">
    <div class="col-lg-12">
            <?php
            if (!empty($section_data)) {
                $sectionData = json_decode(unserialize($section_data), TRUE);
            } else {
                $sectionData = '';
            }
             
            ?>
            <table class="table table-bordered" >
                <tr>
                    <th class="col-lg-4">Category Name</th>
                    <th class="col-lg-4">Category Display Title</th>
                    <th>Categories Show/Hide</th>
                </tr>
                <?php
//                echo '<pre>';
//                print_r($categories);
//                echo '</pre>';
                
                
                if (is_array($categories['main'])) {

                    foreach ($categories['main'] as $cid => $category) {
                        ?>  
                        <tr>
                            <th>
                                <?= $category->name ?>
                                <?php
                                $category_titles =  isset($sectionData['category_titles'][$cid]) ? $sectionData['category_titles'][$cid] : '';
                                ?>
                            </th>
                            <th>
                                <input type="text" name="category_titles[<?= $cid ?>]" value="<?= $category_titles ? $category_titles : $category->name ?>"  placeholder="<?= $category->name ?>" class="form-control" maxlength="50" />
                            </th>
                            <td>
                                <?php
                                     if(!empty($sectionData) && is_array($sectionData)) {
                                         
                                        $checked = in_array($cid, $sectionData['section_top_categories']) ? 'checked="checked" ' : '';
                                     } else {
                                        
                                        $checked = 'checked="checked" ';
                                     }
                                ?>
                                <label class="col-md-4" style="font-weight: normal; cursor: pointer;"><input type="checkbox" <?= $checked ?> name="section_top_categories[<?= $cid ?>]" value="<?= $cid ?>" class="form-control" /></label>
                                         
                            </td>
                        </tr>
            <?php
                    }
                }
                ?>
            </table>  
        
    </div>
</div>

