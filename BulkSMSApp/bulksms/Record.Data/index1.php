<!doctype html>
<html lang="en" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href='http://fonts.googleapis.com/css?family=PT+Sans:400,700' rel='stylesheet' type='text/css'>

    <link rel="stylesheet" href="../static/css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="../static/css/styles.css"> <!-- Resource style -->
    <script src="../static/javascript/modernizr.js"></script> <!-- Modernizr -->

    <title>Responsive Tabbed Navigation | CodyHouse</title>
</head>
<body>
<div class="cd-tabs">
    <nav>
        <ul class="cd-tabs-navigation">
            <li><a data-content="inbox" class="selected" href="#0">Inbox</a></li>
            <li><a data-content="new" href="#0">New</a></li>
            <li class="disabled"><a data-content="gallery" href="#0">Gallery</a></li>
            <li><a data-content="store" href="#0">Store</a></li>
            <li><a data-content="settings" href="#0">Settings</a></li>
            <li><a data-content="trash" href="#0">Trash</a></li>
        </ul> <!-- cd-tabs-navigation -->
    </nav>

    <ul class="cd-tabs-content">
        <li data-content="inbox" class="selected" id="myTabs">
            <form action="" method="post">
                <h2> PART 1: MOTHER AND CHILD IDENTIFICATION</h2>
                <table class="main-table">
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td class="row-title">
                            A. Mother's Profile
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;<table class="middle-content">
                                <tr align="right">
                                    <td valign="baseline">Mother's Name: </td>
                                    <td colspan="3" align="left"><input type="text" name="mother_input" class="style-input-lg-long" /> </td>
                                </tr>
                                <tr>
                                    <td valign="baseline" align="right" width="20%">Date of Birth: </td>
                                    <td align="right" valign="top" width="20%"><input type="date" name="mother_name_input" class="style-input-lg-medium date-input" /> </td>
                                    <td align="right">&nbsp;</td>
                                    <td valign="baseline" align="right" width="20%">Education: </td>
                                    <td align="left" width="20%">
                                        <input type="radio" name="education_input" value="none">None<br/>
                                        <input type="radio" name="education_input" value="primary">Primary<br/>
                                        <input type="radio" name="education_input" value="seondary">Secondary<br/>
                                        <input type="radio" name="education_input" value="postsecondary">Post Secondary<br/>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="5">&nbsp;</td>
                                </tr>

                                <tr>
                                    <td align="right" valign="top" width="20%">Occupation: </td>
                                    <td align="right" width="20%"><input type="text" name="Occupation" class="style-input-lg-medium" </td>
                                    <td align="right">&nbsp;</td>
                                    <td align="right" valign="top" width="20%">Marital Status: </td>
                                    <td align="left" width="20%">
                                        <input type="radio" name="marital_status_choice" value="married" />Married <br/>
                                        <input type="radio" name="marital_status_choice" value="single" />Single <br/>
                                        <input type="radio" name="marital_status_choice" value="mwidow" />Widow <br/>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="row-title">
                            B. Child's Profile (after birth)
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="middle-content">

                                <tr>
                                    <td valign="baseline" align="right" width="20%">Child's Name: </td>
                                    <td align="right" width="20%"><input type="text" name="child_name_input" class="style-input-lg-medium date-input" /> </td>
                                    <td align="right">&nbsp;</td>
                                    <td valign="top" align="right" width="20%">Sex: </td>
                                    <td align="left" width="20%">
                                        <input type="radio" name="child_sex" value="m" />Male<br />
                                        <input type="radio" name="child_sex" value="f" />Female
                                    </td>
                                </tr>

                                <tr align="right">
                                    <td width="20%">Date of Birth: </td>
                                    <td width="20%"><input type="date" name="child_dob" class="style-input-lg-medium" </td>
                                    <td>&nbsp;</td>
                                    <td width="20%">Birth Weight(Kg): </td>
                                    <td width="20%"><input type="number" name="child_weight" class="style-input-lg-medium" /> </td>
                                </tr>
                                <tr>
                                    <td colspan="5">&nbsp;</td>
                                </tr>

                                <tr align="right">
                                    <td width="20%">Birth Order: </td>
                                    <td width="20%"><input type="text" name="child_birth_order" class="style-input-lg-medium" </td>
                                    <td>&nbsp;</td>
                                    <td width="20%">Birth Registration No: </td>
                                    <td width="20%"><input type="number" name="child_reg_no" class="style-input-lg-medium" /> </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="row-title">
                            C. Home's Address (Where the child lives)
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="middle-content">
                                <tr align="right">
                                    <td valign="baseline" width="20%">Village / LC 1: </td>
                                    <td width="20%"><input type="text" name="village_input" class="style-input-lg-medium date-input" /> </td>
                                    <td>&nbsp;</td>
                                    <td valign="baseline" width="20%">Parish: </td>
                                    <td width="20%"><input type="text" name="Parish_input" class="style-input-lg-medium" /> </td>
                                </tr>
                                <tr>
                                    <td colspan="5">&nbsp;</td>
                                </tr>

                                <tr align="right">
                                    <td width="20%">Sub (County): </td>
                                    <td width="20%"><input type="text" name="subcounty" class="style-input-lg-medium" </td>
                                    <td>&nbsp;</td>
                                    <td width="20%">District: </td>
                                    <td width="20%"><input type="text" name="district" class="style-input-lg-medium" /> </td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td class="row-title">
                            D. Next of kin identification
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table class="middle-content">
                                <tr align="right" width="20%">
                                    <td valign="top">Next of Kin: </td>
                                    <td align="left" width="20%">
                                        <input type="radio" name="next_kin" value="mother">Mother<br/>
                                        <input type="radio" name="next_kin" value="father">Father<br/>
                                        <input type="radio" name="next_kin" value="guardian">Guardian<br/>
                                        <input type="radio" name="next_kin" value="other">Other<br/>
                                    </td>
                                    <td>&nbsp;</td>
                                    <td valign="baseline" width="20%">Occupation: </td>
                                    <td valign="top" align="right" width="20%"><input type="text" name="kin_occupation_input" class="style-input-lg-medium" /> </td>
                                </tr>
                                <tr>
                                    <td colspan="5">&nbsp;</td>
                                </tr>

                                <tr align="right">
                                    <td width="20%">Contact Address / Phone: </td>
                                    <td width="20%"><input type="text" name="kin_contact" class="style-input-lg-medium" </td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp; </td>
                                    <td>&nbsp;</td>
                                </tr>

                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;
                        </td>
                    </tr>
                    <tr align="center">
                        <td>
                            <button type="submit" name="CancelButton" class="space-btns">Cancel</button>

                            <button type="submit" name="SaveButton" style="white-space: nowrap" class="space-btns">Next &gt;&gt;</button>
                        </td>
                    </tr>
                </table>
            </form>
        </li>

        <li data-content="new">
            <p>New Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non a voluptatibus, ex odit totam cumque nihil eos asperiores ea, labore rerum. Doloribus tenetur quae impedit adipisci, laborum dolorum eaque ratione quaerat, eos dicta consequuntur atque ex facere voluptate cupiditate incidunt.</p>

            <p>New Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non a voluptatibus, ex odit totam cumque nihil eos asperiores ea, labore rerum. Doloribus tenetur quae impedit adipisci, laborum dolorum eaque ratione quaerat, eos dicta consequuntur atque ex facere voluptate cupiditate incidunt.</p>
        </li>

        <li data-content="gallery">
            <p>Gallery Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque tenetur aut, cupiditate, libero eius rerum incidunt dolorem quo in officia.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A ipsa vero, culpa doloremque voluptatum consectetur mollitia, atque expedita unde excepturi id, molestias maiores delectus quos molestiae. Ab iure provident adipisci eveniet quisquam ratione libero nam inventore error pariatur optio facilis assumenda sint atque cumque, omnis perspiciatis. Maxime minus quam voluptatum provident aliquam voluptatibus vel rerum. Soluta nulla tempora aspernatur maiores! Animi accusamus officiis neque exercitationem dolore ipsum maiores delectus asperiores reprehenderit pariatur placeat, quaerat sed illum optio qui enim odio temporibus, nulla nihil nemo quod dicta consectetur obcaecati vel. Perspiciatis animi corrupti quidem fugit deleniti, atque mollitia labore excepturi ut.</p>
        </li>

        <li data-content="store">
            <p>Store Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum recusandae rem animi accusamus quisquam reprehenderit sed voluptates, numquam, quibusdam velit dolores repellendus tempora corrupti accusantium obcaecati voluptate totam eveniet laboriosam?</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eligendi, enim, pariatur. Ab assumenda, accusantium! Consequatur magni placeat quae eos dicta, cum expedita sunt facilis est impedit possimus dolorum sequi nostrum nobis sit praesentium molestias nulla laudantium fugit corporis nam ut saepe harum ipsam? Debitis accusantium, omnis repudiandae modi, distinctio illo voluptatibus aperiam odio veritatis, quam perferendis eaque ullam. Temporibus tempore ad voluptates explicabo ea sit deleniti ipsum quos dolores tempora odio, ab corporis molestiae, eaque optio, perferendis! Cumque libero quia modi! Totam magni rerum id iusto explicabo distinctio, magnam, labore sed nemo expedita velit quam, perspiciatis non temporibus sit minus voluptatum. Iste, cumque sunt suscipit facere iusto asperiores, ullam dolorum excepturi quidem ea quibusdam deserunt illo. Nesciunt voluptates repellat ipsam.</p>
        </li>

        <li data-content="settings">
            <p>Settings Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laboriosam nam magni, ullam nihil a suscipit, ex blanditiis, adipisci tempore deserunt maiores. Nostrum officia, ratione enim eaque nihil quis ea, officiis iusto repellendus. Animi illo in hic, maxime deserunt unde atque a nesciunt? Non odio quidem deserunt animi quod impedit nam, voluptates eum, voluptate consequuntur sit vel, et exercitationem sint atque dolores libero dolorem accusamus ratione iste tenetur possimus excepturi. Accusamus vero, dignissimos beatae tempore mollitia officia voluptate quam animi vitae.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Similique ipsam eum reprehenderit minima at sapiente ad ipsum animi doloremque blanditiis unde omnis, velit molestiae voluptas placeat qui provident ab facilis.</p>
        </li>

        <li data-content="trash">
            <p>Trash Lorem ipsum dolor sit amet, consectetur adipisicing elit. Optio itaque a iure nostrum animi praesentium, numquam quidem, nemo, voluptatem, aspernatur incidunt. Fugiat aspernatur excepturi fugit aut, dicta reprehenderit temporibus, nobis harum consequuntur quo sed, illum.</p>

            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima doloremque optio tenetur, natus voluptatum error vel dolorem atque perspiciatis aliquam nemo id libero dicta est saepe laudantium provident tempore ipsa, accusamus similique laborum, consequatur quia, aut non maiores. Consectetur minus ipsum aliquam pariatur dolorem rerum laudantium minima perferendis in vero voluptatem suscipit cum labore nemo explicabo, itaque nobis debitis molestias officiis? Impedit corporis voluptates reiciendis deleniti, magnam, fuga eveniet! Velit ipsa quo labore molestias mollitia, quidem, alias nisi architecto dolor aliquid qui commodi tempore deleniti animi repellat delectus hic. Alias obcaecati fuga assumenda nihil aliquid sed vero, modi, voluptatem? Vitae voluptas aperiam nostrum quo harum numquam earum facilis sequi. Labore maxime laboriosam omnis delectus odit harum recusandae sint incidunt, totam iure commodi ducimus similique doloremque! Odio quaerat dolorum, alias nihil quam iure delectus repellendus modi cupiditate dolore atque quasi obcaecati quis magni excepturi vel, non nemo consequatur, mollitia rerum amet in. Nesciunt placeat magni, provident tempora possimus ut doloribus ullam!</p>
        </li>
    </ul> <!-- cd-tabs-content -->
</div> <!-- cd-tabs -->

<script src="../static/javascript/jquery-3.3.1.min.js"></script>
<script src="../static/javascript/main.js"></script> <!-- Resource jQuery -->
<script src="../static/javascript/link-disabler.js"></script> <!-- DIabling Links jQuery -->
<script>
    $("#myTabs form").on('submit',function(e) {
        e.preventDefault();

        var li_count = $('.cd-tabs-navigation li').length;
        var current_active = $('.cd-tabs-navigation li.active').index();

        if(current_active<li_count){
            $('.nav-tabs li.active').next('li').find('a').attr('data-toggle','tab').tab('show');
        }else{
            alert('Last Step');
        }
    });
</script>
</body>
</html>