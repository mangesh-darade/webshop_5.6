<div class="row">
    <div class="col-lg-12">
            <?php
            if (!empty($sections['section_subcategory_tabs_multiple_sections'])) {
                $sectionData = json_decode(unserialize($sections['section_subcategory_tabs_multiple_sections']), TRUE);
            }
            ?>
            <table class="table table-bordered" >
                <tr>
                    <th class="col-lg-3">Category Name / Sections Title</th>
                    <th>Section Tab Categories Show/Hide <small class="text-danger">(Only first 4 subcategories will display on each Category Tab Section)</small></th>
                </tr>
                <?php
                if (is_array($categories['main'])) {

                    foreach ($categories['main'] as $cid => $category) {
                        ?>  
                        <tr>
                            <th>
                                <?= $category->name ?>
                                <?php
                                $section_titles = $sectionData['section_titles'][$cid] ? $sectionData['section_titles'][$cid] : '';
                                ?>
                                <input type="text" name="section_title[<?= $cid ?>]" value="<?= $section_titles ?>"  placeholder="<?= $category->name . ' Products' ?>" class="form-control" maxlength="50" />
                            </th>
                            <td>
                                <?php
                                if (isset($categories[$category->id]) && is_array($categories[$category->id])) {
                                    $ckecked = '';
                                    foreach ($categories[$category->id] as $scid => $subcategory) {
                                        if (is_array($sectionData['section_tab_categories'][$category->id])) {
                                            $ckecked = in_array($scid, $sectionData['section_tab_categories'][$category->id]) ? 'checked="checked" ' : '';
                                        }
                                        ?><label class="col-md-4" style="font-weight: normal; cursor: pointer;"><input type="checkbox" <?= $ckecked ?> name="section_subcategory_tabs_products[<?= $cid ?>][]" value="<?= $scid ?>" class="form-control" /> <?= $subcategory->name ?></label>
                                        <?php
                                        }
                                    }
                                    ?>
                            </td>
                        </tr>
            <?php
                    }
                }
                ?>
            </table>  
        
    </div>
</div>

