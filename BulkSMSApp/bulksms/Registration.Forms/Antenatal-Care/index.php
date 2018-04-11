<?php
session_start();
/**
 * Created by PhpStorm.
 * User: sbtech
 * Date: 2/26/18
 * Time: 10:39 AM
 */
#echo 'OK';
if(isset($_POST['createprofile'])){
    header('Location: ../../Record.Data/patient-info.php');

}
if(isset($_SESSION['user'])) {
    include_once 'antenatal.care.index.php';
    ?>

    <form method="post" action="index.php" id="AntenatalRegistration">

        <!-- One "tab" for each step in the form: -->
        <div class="tab">
            <div class="page-title-2"><h2> PART 1: MOTHER AND CHILD IDENTIFICATION</h2></div>
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
                                <td valign="baseline">Mother's Name:</td>
                                <td colspan="3" align="left"><input type="text" name="mother_input"
                                                                    class="style-input-lg-long"/></td>
                            </tr>
                            <tr>
                                <td valign="baseline" align="right" width="20%">Date of Birth:</td>
                                <td align="right" valign="top" width="20%"><input type="date" name="mother_name_input"
                                                                                  class="style-input-lg-medium date-input"/>
                                </td>
                                <td align="right">&nbsp;</td>
                                <td valign="baseline" align="right" width="20%">Education:</td>
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
                                <td align="right" valign="top" width="20%">Occupation:</td>
                                <td align="right" width="20%"><input type="text" name="Occupation"
                                                                     class="style-input-lg-medium"</td>
                                <td align="right">&nbsp;</td>
                                <td align="right" valign="top" width="20%">Marital Status:</td>
                                <td align="left" width="20%">
                                    <input type="radio" name="marital_status_choice" value="married"/>Married <br/>
                                    <input type="radio" name="marital_status_choice" value="single"/>Single <br/>
                                    <input type="radio" name="marital_status_choice" value="mwidow"/>Widow <br/>
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
                                <td valign="baseline" align="right" width="20%">Child's Name:</td>
                                <td align="right" width="20%"><input type="text" name="child_name_input"
                                                                     class="style-input-lg-medium date-input" required/>
                                </td>
                                <td align="right">&nbsp;</td>
                                <td valign="top" align="right" width="20%">Sex:</td>
                                <td align="left" width="20%">
                                    <input type="radio" name="child_sex" value="m"/>Male<br/>
                                    <input type="radio" name="child_sex" value="f"/>Female
                                </td>
                            </tr>

                            <tr align="right">
                                <td width="20%">Date of Birth:</td>
                                <td width="20%"><input type="date" name="child_dob" class="style-input-lg-medium"</td>
                                <td>&nbsp;</td>
                                <td width="20%">Birth Weight(Kg):</td>
                                <td width="20%"><input type="number" name="child_weight" class="style-input-lg-medium"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">&nbsp;</td>
                            </tr>

                            <tr align="right">
                                <td width="20%">Birth Order:</td>
                                <td width="20%"><input type="text" name="child_birth_order"
                                                       class="style-input-lg-medium"</td>
                                <td>&nbsp;</td>
                                <td width="20%">Birth Registration No:</td>
                                <td width="20%"><input type="number" name="child_reg_no" class="style-input-lg-medium"/>
                                </td>
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
                                <td valign="baseline" width="20%">Village / LC 1:</td>
                                <td width="20%"><input type="text" name="village_input"
                                                       class="style-input-lg-medium date-input"/></td>
                                <td>&nbsp;</td>
                                <td valign="baseline" width="20%">Parish:</td>
                                <td width="20%"><input type="text" name="Parish_input" class="style-input-lg-medium"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">&nbsp;</td>
                            </tr>

                            <tr align="right">
                                <td width="20%">Sub (County):</td>
                                <td width="20%"><input type="text" name="subcounty" class="style-input-lg-medium"</td>
                                <td>&nbsp;</td>
                                <td width="20%">District:</td>
                                <td width="20%"><input type="text" name="district" class="style-input-lg-medium"/></td>
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
                                <td valign="top">Next of Kin:</td>
                                <td align="left" width="20%">
                                    <input type="radio" name="next_kin" value="mother">Mother<br/>
                                    <input type="radio" name="next_kin" value="father">Father<br/>
                                    <input type="radio" name="next_kin" value="guardian">Guardian<br/>
                                    <input type="radio" name="next_kin" value="other">Other<br/>
                                </td>
                                <td>&nbsp;</td>
                                <td valign="baseline" width="20%">Occupation:</td>
                                <td valign="top" align="right" width="20%"><input type="text"
                                                                                  name="kin_occupation_input"
                                                                                  class="style-input-lg-medium"/></td>
                            </tr>
                            <tr>
                                <td colspan="5">&nbsp;</td>
                            </tr>

                            <tr align="right">
                                <td width="20%">Contact Address / Phone:</td>
                                <td width="20%"><input type="text" name="kin_contact" class="style-input-lg-medium"</td>
                                <td>&nbsp;</td>
                                <td>&nbsp;</td>
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

            </table>
        </div>

        <div class="tab">
            <div class="page-title-2"><h2> PART 2: RECORD OF PREVIOUS PREGNANCIES</h2></div>
            <table class="main-table">
                <tr>
                    <td>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td class="row-title">
                        A. Past Medical and Social History
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
                                <td valign="baseline" align="left" width="20%">
                                    <input type="checkbox" name="medicalproblems" value=""/>ProblemSet 1<br/>
                                    <input type="checkbox" name="medicalproblems" value=""/>ProblemSet 2<br/>
                                    <input type="checkbox" name="medicalproblems" value=""/>ProblemSet 3<br/>
                                    <input type="checkbox" name="medicalproblems" value=""/>ProblemSet 4<br/>
                                    <input type="checkbox" name="medicalproblems" value=""/>ProblemSet 5<br/>
                                </td>
                                <td>&nbsp;</td>
                                <td align="left" width="20%">
                                    <input type="checkbox" name="medicalproblems" value=""/>ProblemSet 6<br/>
                                    <input type="checkbox" name="medicalproblems" value=""/>ProblemSet 7<br/>
                                    <input type="checkbox" name="medicalproblems" value=""/>ProblemSet 8<br/>
                                    <input type="checkbox" name="medicalproblems" value=""/>ProblemSet 9<br/>
                                    <input type="checkbox" name="medicalproblems" value=""/>ProblemSet 10<br/>
                                </td>

                            </tr>

                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="row-title">
                        B. Past Surgical Hsitory (indicate type and Date surgery performed)
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
                                <td valign="baseline" align="right" width="40%">Operations (Type):</td>
                                <td align="right" width="20%"><input type="text" name=""
                                                                     class="style-input-lg-long date-input"/></td>
                                <td align="right">&nbsp;</td>
                                <td valign="top" align="right" width="20%">Year:</td>
                                <td align="left" width="20%"><input type="number" name="" class="style-input-lg-short"/>
                                </td>
                            </tr>

                            <tr align="right">
                                <td width="40%">Blood Transfusions (Why?):</td>
                                <td width="20%"><input type="text" name="" class="style-input-lg-long"</td>
                                <td>&nbsp;</td>
                                <td width="20%">Year:</td>
                                <td width="20%"><input type="number" name="" class="style-input-lg-short"/></td>
                            </tr>
                            <tr>
                                <td colspan="5">&nbsp;</td>
                            </tr>

                            <tr align="right">
                                <td width="40%">Fracture of Pelvis, Spine and Femur:</td>
                                <td width="20%"><input type="text" name="" class="style-input-lg-long"</td>
                                <td>&nbsp;</td>
                                <td width="20%">Year:</td>
                                <td width="20%"><input type="number" name="" class="style-input-lg-short"/></td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="row-title">
                        C. Past Obstetric and Gynaecological History
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
                                <td valign="baseline" align="right" width="40%">Number of Pregnancies:</td>
                                <td align="right" width="20%"><input type="number" name=""
                                                                     class="style-input-lg-short"/></td>
                                <td align="right">&nbsp;</td>
                                <td align="right" width="20%" valign="top">
                                    <input type="checkbox" name="" value="1"/>
                                </td>
                                <td valign="top" align="left" width="20%">Vacuum Extraction, Forceps:</td>
                            </tr>

                            <tr>
                                <td valign="baseline" align="right" width="40%">Number of Deliveries:</td>
                                <td align="right" width="20%"><input type="number" name=""
                                                                     class="style-input-lg-short"/></td>
                                <td align="right">&nbsp;</td>
                                <td align="right" width="20%" valign="top">
                                    <input type="checkbox" name="" value="1"/>
                                </td>
                                <td valign="top" align="left" width="20%">Retained Placenta:</td>
                            </tr>

                            <tr>
                                <td valign="baseline" align="right" width="40%">Number of Living Children:</td>
                                <td align="right" width="20%"><input type="number" name=""
                                                                     class="style-input-lg-short"/></td>
                                <td align="right">&nbsp;</td>
                                <td align="right" width="20%" valign="top">
                                    <input type="checkbox" name="" value="1"/>
                                </td>
                                <td valign="top" align="left" width="20%">PPH:</td>
                            </tr>

                            <tr>
                                <td valign="baseline" align="right" width="40%">Number of Miscarriages:</td>
                                <td align="right" width="20%"><input type="number" name=""
                                                                     class="style-input-lg-short"/></td>
                                <td align="right">&nbsp;</td>
                                <td align="right" width="20%" valign="top">
                                    <input type="checkbox" name="" value="1"/>
                                </td>
                                <td valign="top" align="left" width="40%">Operations on the uterus:</td>
                            </tr>
                            <tr>
                                <td valign="baseline" align="right" width="40%">Number of still births:</td>
                                <td align="right" width="20%"><input type="number" name=""
                                                                     class="style-input-lg-short"/></td>
                                <td align="right">&nbsp;</td>
                                <td align="right" width="20%" valign="top">
                                    <input type="checkbox" name="" value="1"/>
                                </td>
                                <td valign="top" align="left" width="40%">Cervical Shrodkar, Mc Donald:</td>
                            </tr>
                            <tr>
                                <td valign="baseline" align="right" width="20%">Number of Premature Births:</td>
                                <td align="right" width="20%"><input type="number" name=""
                                                                     class="style-input-lg-short"/></td>
                                <td align="right">&nbsp;</td>
                                <td valign="top" align="right" width="40%">Interval from last pregnancy (years):</td>
                                <td align="left" width="20%">
                                    <input type="number" name="" value="" class="style-input-lg-short"/>
                                </td>
                            </tr>
                            <tr>
                                <td valign="baseline" align="right" width="20%">Number of Caesarian Sections:</td>
                                <td align="right" width="20%"><input type="number" name=""
                                                                     class="style-input-lg-short"/></td>
                                <td align="right">&nbsp;</td>
                                <td align="right" width="40%">Who assisted previous delivery:</td>
                                <td align="left" width="20%">
                                    <input type="text" name="" value="" class="style-input-lg-short"/>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>

        <div class="tab">
            <div class="page-title-2"><h2> PART 3: RECORD CURRENT PREGNANCY</h2></div>
            <table class="main-table">
                <tr>
                    <td>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td class="row-title">
                        A. General
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="">

                            <tr>
                                <td align="right" width="17%">Gravida:</td>
                                <td align="left" width="17%"><input type="number" name="" class="style-input-lg-short"/>
                                </td>
                                <td>&nbsp;</td>
                                <td align="right" width="17%">Para:</td>
                                <td align="left" width="17%"><input type="number" name="" class="style-input-lg-short"/>
                                </td>
                                <td>&nbsp;</td>
                                <td align="right" width="15%">First day LNMP:</td>
                                <td align="left" width="15%"><input type="date" name="" class="style-input-lg-short"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="8">&nbsp;</td>
                            </tr>

                            <tr>
                                <td align="right" width="17%">EDD:</td>
                                <td align="left" width="17%"><input type="date" name="" class="style-input-lg-short"/>
                                </td>
                                <td align="right">&nbsp;</td>
                                <td align="right" width="17%" style="white-space: nowrap">Blood Group:</td>
                                <td align="left" width="17%"><input type="number" name="" class="style-input-lg-short"/>
                                </td>
                                <td align="right">&nbsp;</td>
                                <td align="right" width="15%" style="white-space: nowrap">Hb (mg /dl):</td>
                                <td align="left" width="15%"><input type="number" name="" class="style-input-lg-short"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="8">&nbsp;</td>
                            </tr>

                            <tr>
                                <td valign="top" align="right" width="17%" style="white-space: nowrap">RH Factor:</td>
                                <td align="left" width="17%">
                                    <input type="radio" name="" value=""/>Postive<br/>
                                    <input type="radio" name="" value=""/>Negative
                                </td>
                                <td align="right">&nbsp;</td>
                                <td align="right" width="17%">Date:</td>
                                <td align="left" width="17%"><input type="date" name="" class="style-input-lg-short"/>
                                </td>
                                <td align="right">&nbsp;</td>
                                <td align="right" width="15%">Para:</td>
                                <td align="left" width="15%"><input type="number" name="" class="style-input-lg-short"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="8">&nbsp;</td>
                            </tr>

                            <tr>
                                <td valign="top" align="right" width="17%" style="white-space: nowrap">Syphilis Test:
                                </td>
                                <td align="left" width="17%">
                                    <input type="radio" name="" value=""/>Positive<br/>
                                    <input type="radio" name="" value=""/>Negative
                                </td>
                                <td align="right">&nbsp;</td>
                                <td valign="top" align="right" width="17%" style="white-space: nowrap">Any
                                    Hospitalisation:
                                </td>
                                <td align="left" width="17%">
                                    <input type="radio" name="" value=""/>Yes<br/>
                                    <input type="radio" name="" value=""/>No
                                </td>
                                <td align="right">&nbsp;</td>
                                <td align="right" width="15%">Hegight:</td>
                                <td align="left" width="15%"><input type="number" name="" class="style-input-lg-short"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="8">&nbsp;</td>
                            </tr>

                            <tr>
                                <td valign="top" align="right" width="17%" style="white-space: nowrap">Mother HIV:</td>
                                <td align="left" width="17%">
                                    <input type="radio" name="" value=""/>Positive<br/>
                                    <input type="radio" name="" value=""/>Negative
                                </td>
                                <td align="right">&nbsp;</td>
                                <td valign="top" align="right" width="17%" style="white-space: nowrap">Partner HIV:</td>
                                <td align="left" width="17%">
                                    <input type="radio" name="" value=""/>Positive<br/>
                                    <input type="radio" name="" value=""/>Negative
                                </td>
                                <td align="right">&nbsp;</td>
                                <td align="right" width="15%">Date:</td>
                                <td align="left" width="15%"><input type="date" name="" class="style-input-lg-short"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="8">&nbsp;</td>
                            </tr>

                            <tr>
                                <td valign="top" align="right" width="17%" style="white-space: nowrap">Partner HIV
                                    Disclosure:
                                </td>
                                <td align="left" width="17%">
                                    <input type="radio" name="" value=""/>Yes<br/>
                                    <input type="radio" name="" value=""/>No
                                </td>
                                <td align="right">&nbsp;</td>
                                <td valign="baseline" align="right" width="30%">Type of Contraception used before this
                                    pregnancy:
                                </td>
                                <td align="left" width="30%" colspan="3"><input type="text" name=""
                                                                                class="style-input-lg-long"/></td>

                            </tr>


                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="row-title">
                        B. Examination
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
                                <td valign="top" align="right">Any of these present for one month:</td>
                                <td align="left" width="20%">
                                    <input type="checkbox" name="" value="">Fever<br/>
                                    <input type="checkbox" name="" value="">Cough<br/>
                                    <input type="checkbox" name="" value="">Diarrhoea<br/>
                                    <input type="checkbox" name="" value="">Weight Loss<br/>
                                    <input type="checkbox" name="" value="">Headache<br/>
                                </td>
                                <td>&nbsp;</td>
                                <td align="right" width="20%">Temperature (<sup>o</sup>C):</td>
                                <td align="left" width="20%">
                                    <input type="number" name="" class="style-input-lg-short"/>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="5">&nbsp;</td>
                            </tr>

                            <tr>
                                <td valign="baseline" align="right" width="20%">Pulse Rate (rate/minute):</td>
                                <td align="left" width="20%"><input type="number" name="" class="style-input-lg-short"/>
                                </td>
                                <td>&nbsp;</td>
                                <td align="right" width="20%">Blood Pressure (mmHg):</td>
                                <td align="left" width="20%" valign="top">
                                    <input type="number" name="" class="style-input-lg-short"/>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="5">&nbsp;</td>
                            </tr>


                            <tr>
                                <td valign="baseline" align="right" width="40%">Haemoglobin (mg /dl):</td>
                                <td align="left" width="20%"><input type="number" name="" class="style-input-lg-short"/>
                                </td>
                                <td>&nbsp;</td>
                                <td align="right" width="20%" valign="top">
                                    <input type="checkbox" name="" value=""/>
                                </td>
                                <td valign="top" align="left" width="40%">Proteinuria:</td>
                            </tr>

                            <tr>
                                <td colspan="5">&nbsp;</td>
                            </tr>

                            <tr>
                                <td valign="baseline" align="right" width="40%">Weeks of Amenorrhea / Gestation
                                    Period:
                                </td>
                                <td align="left" width="20%"><input type="number" name="" class="style-input-lg-short"/>
                                </td>
                                <td align="right">&nbsp;</td>
                                <td align="right" width="20%">Fundal Height (Weeks):</td>
                                <td align="left" width="20%" valign="top">
                                    <input type="number" name="" class="style-input-lg-short"/>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="5">&nbsp;</td>
                            </tr>

                            <tr>
                                <td valign="top">Fetal Position:</td>
                                <td align="left" width="20%">
                                    <input type="radio" name="" value="cephalic">Cephalic<br/>
                                    <input type="radio" name="" value="breech">Breechr<br/>
                                    <input type="radio" name="" value="transverse">Transverse<br/>
                                </td>
                                <td align="right">&nbsp;</td>
                                <td align="right" width="20%">Fetal Heart Beat (per minute):</td>
                                <td align="left" width="20%" valign="top">
                                    <input type="number" name="" class="style-input-lg-short"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">&nbsp;</td>
                            </tr>

                            <tr>
                                <td valign="top">Choose One:</td>
                                <td align="left" width="20%">
                                    <input type="checkbox" name="" value="">Respiratory<br/>
                                    <input type="checkbox" name="" value="">CVS<br/>
                                    <input type="checkbox" name="" value="">Abdomen<br/>
                                    <input type="checkbox" name="" value="">Breasts<br/>
                                    <input type="checkbox" name="" value="">LN<br/>
                                    <input type="checkbox" name="" value="">Deformities<br/>
                                    <input type="checkbox" name="" value="">Nails<br/>
                                    <input type="checkbox" name="" value="">Palms<br/>
                                    <input type="checkbox" name="" value="">Jaundice<br/>
                                    <input type="checkbox" name="" value="">H .Zooster<br/>
                                </td>
                                <td align="right">&nbsp;</td>
                                <td align="right" width="20%" style="white-space: nowrap">Vaginal Examination:</td>
                                <td align="left" width="20%">
                                    <input type="radio" name="" value="">Bleeding<br/>
                                    <input type="radio" name="" value="">Good<br/>
                            </tr>

                            <tr>
                                <td colspan="5">&nbsp;</td>
                            </tr>

                            <tr>
                                <td valign="baseline" align="right" width="40%">If HIV+ CD4 COUNT:</td>
                                <td align="left" width="20%"><input type="number" name="" class="style-input-lg-short"/>
                                </td>
                                <td align="right">&nbsp;</td>
                                <td align="right" width="20%" valign="top">
                                    <input type="checkbox" name="" value=""/>
                                </td>
                                <td valign="top" align="left" width="40%">Advice given on risk related to the
                                    pregnancy
                                </td>
                            </tr>

                            <tr>
                                <td colspan="5">&nbsp;</td>
                            </tr>

                            <tr>
                                <td valign="baseline" align="right" width="20%">REFERRAL, FEEDBACK:</td>
                                <td align="left" width="40%"><input type="number" name=""
                                                                    class="style-input-lg-medium"/></td>
                                <td align="right">&nbsp;</td>
                                <td align="right" width="20%">Name of Health Facility, HW Initials:</td>
                                <td align="left" width="20%" valign="top">
                                    <input type="text" name="" class="style-input-lg-medium"/>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="5">&nbsp;</td>
                            </tr>

                            <tr>
                                <td valign="baseline" align="right" width="40%">Next Appointment Date:</td>
                                <td align="left" width="20%"><input type="date" name="" class="style-input-lg-short"/>
                                </td>
                                <td align="right">&nbsp;</td>
                                <td align="right" width="20%">&nbsp;</td>
                                <td align="left" width="20%" valign="top">&nbsp;</td>
                            </tr>
                        </table>
                    </td>
                </tr>


                <tr align="center">
                    <td>&nbsp;</td>
                </tr>


            </table>
        </div>

        <div class="tab">
            <div class="page-title-2"><h2> PREVENTIVE SERVICES</h2></div>
            <table class="main-table">

                <tr>
                    <td>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td class="row-title">
                        PREVENTIVE SERVICES
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class=" middle-content">

                            <tr>
                                <td align="right" width="17%">Vaccine:</td>
                                <td align="left" width="17%"><input type="text" name="" class="style-input-lg-short"
                                                                    value="T.T.1"/></td>
                                <td>&nbsp;</td>
                                <td align="right" width="17%">Date:</td>
                                <td align="left" width="17%"><input type="date" name="" class="style-input-lg-short"/>
                                </td>
                                <td>&nbsp;</td>
                                <td align="right" width="15%">Next Visit:</td>
                                <td align="left" width="15%"><input type="date" name="" class="style-input-lg-short"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="8">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="2" align="right" valign="top"><strong>Tetanus Toxid Instructions: </strong>
                                </td>
                                <td colspan="6"><em>Ask about the number of T.T injections received in a mother's life
                                        to date. If none given, then <br> for <strong>T.T.1;</strong> administer at
                                        first contact or as early as possible during pregnancy</em></td>
                            </tr>

                        </table>
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td class="row-title">
                        Prevention of Malaria and Anaemia
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class=" ">

                            <tr>
                                <td align="right" width="17%">Intervention:</td>
                                <td align="left" width="17%"><input type="text" name="" class="style-input-lg-short"
                                                                    value="Intermitted Presumptive Treatment: IPT1"/>
                                </td>
                                <td>&nbsp;</td>
                                <td align="right" width="17%">Date:</td>
                                <td align="left" width="17%"><input type="date" name="" class="style-input-lg-short"/>
                                </td>
                                <td>&nbsp;</td>
                                <td align="right" width="15%">Next Visit:</td>
                                <td align="left" width="15%"><input type="date" name="" class="style-input-lg-short"/>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="6"><input type="text" class="style-input-lg-long"
                                                       value="Iron Sulphate Supplementation" disabled/></td>
                                <td colspan="2">Date: <input type="date" class="style-input-lg-short" name=""/></td>
                            </tr>
                            <tr>
                                <td colspan="8">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="2" align="right" valign="top">
                                    <input type="checkbox" name="" value=""/>Insecticide Treated Mosquito Net
                                </td>
                                <td colspan="6">&nbsp;</td>
                            </tr>

                        </table>
                    </td>
                </tr>
                <tr>
                    <td class="row-title">
                        C. PMTC Date
                    </td>
                </tr>
                <tr>
                    <td>
                        &nbsp;
                    </td>
                </tr>
                <tr>
                    <td>
                        <table class="">

                            <tr>
                                <td align="right" width="20%" valign="top">
                                    <input type="checkbox" name="" value=""/>
                                </td>
                                <td valign="top" align="left" width="20%" style="white-space: nowrap;">Infant Feeding
                                    Counseling done
                                </td>
                                <td>&nbsp;</td>
                                <td align="right" width="20%" valign="top">
                                    <input type="checkbox" name="" value=""/>
                                </td>
                                <td valign="top" align="left" width="40%" style="white-space: nowrap;">Mother on ARV
                                    Prophylaxis
                                </td>
                                <td>&nbsp;</td>
                                <td valign="top" align="right">Mother's Decision*:</td>
                                <td align="left" width="20%" style="white-space: nowrap;">
                                    <input type="checkbox" name="" value="">Exclusive B/feeding<br/>
                                    <input type="checkbox" name="" value="">Replacement feeding<br/>
                                    <input type="checkbox" name="" value="">Not decided<br/>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="8">&nbsp;</td>
                            </tr>


                            <tr>
                                <td align="right" width="20%" valign="top">
                                    <input type="checkbox" name="" value=""/>
                                </td>
                                <td valign="top" align="left" width="40%" style="white-space: nowrap;">Mother on HAART
                                    (ARV)
                                </td>
                                <td>&nbsp;</td>
                                <td align="right" width="20%" valign="top">
                                    <input type="checkbox" name="" value=""/>
                                </td>
                                <td valign="top" align="left" width="40%" style="white-space: nowrap;">Mother on ARV
                                    Prophylaxis
                                </td>
                                <td>&nbsp;</td>
                                <td valign="top" align="right" style="white-space: nowrap;">AZT + AdNVP:</td>
                                <td align="left" width="20%">
                                    <input type="radio" name="" value="">Yes<br/>
                                    <input type="radio" name="" value="">No<br/>
                                    <input type="radio" name="" value="">NA<br/>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="8">&nbsp;</td>
                            </tr>

                            <tr>
                                <td valign="top" align="right" style="white-space: nowrap;">SdNVP alone:</td>
                                <td align="left" width="20%">
                                    <input type="radio" name="" value="">Yes<br/>
                                    <input type="radio" name="" value="">No<br/>
                                    <input type="radio" name="" value="">NA<br/>
                                </td>
                                <td>&nbsp;</td>
                                <td valign="top" align="right" style="white-space: nowrap;">AZT + TC + NVP:</td>
                                <td align="left" width="20%">
                                    <input type="radio" name="" value="">Yes<br/>
                                    <input type="radio" name="" value="">No<br/>
                                    <input type="radio" name="" value="">NA<br/>
                                </td>
                                <td align="right">Others:</td>
                                <td align="left" width="20%">
                                    <input type="text" name="" class="style-input-lg-short"/>
                                </td>
                            </tr>

                            <tr>
                                <td colspan="8">&nbsp;</td>
                            </tr>

                            <tr>

                                <td align="right" width="20%" valign="top">
                                    <input type="checkbox" name="" value=""/>
                                </td>
                                <td valign="top" align="left" width="40%" style="white-space: nowrap;">Referred to
                                    Psychological group
                                </td>
                                <td colspan="5">&nbsp;</td>
                            </tr>

                        </table>
                    </td>
                </tr>

                <tr>
                    <td>&nbsp;</td>
                </tr>


            </table>
        </div>

        <div style="overflow:auto; margin-top: 10%; clear: both;">
            <div style="float:left; margin-left: 10%;">
                <button type="button" id="prevBtn" onclick="nextPrev(-1)" class="btn warning-btn medium-btn">&lt;&lt;
                    Previous
                </button>

            </div>

            <div style="float:right; margin-right: 10%;">
                <button type="button" name="createprofile" id="nextBtn" onclick="nextPrev(1)"
                        class="btn primary-btn medium-btn">Next&gt;&gt;
                </button>
            </div>
        </div>

        <!-- Circles which indicates the steps of the form: -->
        <div style="text-align:center;margin-top:40px;">
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
            <span class="step"></span>
        </div>

    </form>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../static/javascript/jquery-3.3.1.min.js" crossorigin="anonymous"></script>

    <script>
        var currentTab = 0; // Current tab is set to be the first tab (0)
        showTab(currentTab); // Display the current tab

        function showTab(n) {
            // This function will display the specified tab of the form ...
            var x = document.getElementsByClassName("tab");
            x[n].style.display = "block";
            // ... and fix the Previous/Next buttons:
            if (n == 0) {
                document.getElementById("prevBtn").style.display = "none";
            } else {
                document.getElementById("prevBtn").style.display = "inline";
            }
            if (n == (x.length - 1)) {
                document.getElementById("nextBtn").innerHTML = "Submit";
                nextBtn.setAttribute('name','createprofile')
            } else {
                document.getElementById("nextBtn").innerHTML = "Next";
            }
            // ... and run a function that displays the correct step indicator:
            fixStepIndicator(n)
        }

        function nextPrev(n) {
            // This function will figure out which tab to display
            var x = document.getElementsByClassName("tab");
            // Exit the function if any field in the current tab is invalid:
            if (n == 1 && !validateForm()) return false;
            // Hide the current tab:
            x[currentTab].style.display = "none";
            // Increase or decrease the current tab by 1:
            currentTab = currentTab + n;
            // if you have reached the end of the form... :
            if (currentTab >= x.length) {
                //...the form gets submitted:
                document.getElementById("AntenatalRegistration").submit();
                nextBtn.setAttribute('type','submit')
                return false;
            }
            // Otherwise, display the correct tab:
            showTab(currentTab);
        }

        function validateForm() {
            // This function deals with validation of the form fields
            var x, y, i, valid = true;
            x = document.getElementsByClassName("tab");
            y = x[currentTab].getElementsByTagName("input");
            // A loop that checks every input field in the current tab:
            for (i = 0; i < y.length; i++) {
                // If a field is empty...
                if (y[i].value == "" && y[i].hasAttribute('required')) {
                    // add an "invalid" class to the field:
                    y[i].className += " invalid";
                    // and set the current valid status to false:
                    valid = false;
                }
            }
            // If the valid status is true, mark the step as finished and valid:
            if (valid) {
                document.getElementsByClassName("step")[currentTab].className += " finish";
            }
            return valid; // return the valid status
        }

        function fixStepIndicator(n) {
            // This function removes the "active" class of all steps...
            var i, x = document.getElementsByClassName("step");
            for (i = 0; i < x.length; i++) {
                x[i].className = x[i].className.replace(" active", "");
            }
            //... and adds the "active" class to the current step:
            x[n].className += " active";
        }
    </script>
    </body>
    </html>

<?php
}
?>
