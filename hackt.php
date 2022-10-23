
                        <?
                            $offs = 0;
                            $mp_notif = mysqli_query($connect_db, "SELECT * FROM `mphackt` ORDER BY `id` DESC LIMIT 1 OFFSET $offs");
                        
                            while($notify = mysqli_fetch_assoc($mp_notif)) {
                              $notify_id = $notify['id'];
                              $notify_tag = $notify['tag'];
                              $notify_sender = $notify['sender'];
                              $notify_theme = $notify['theme'];
                              $notify_image = $notify['image'];
                              $notify_content = $notify['content'];
                              $notify_creator = $notify['creator'];
                              $notify_upd = $notify['upd'];
                              $notify_visible = $notify['visible'];
                            }
                            if(($notify_tag == 'profcom' && $user_rang_profcom == '0') || ($notify_tag == 'ss' && $user_rang_ss == '0')) {
                            }
                            else {
                        ?>
                        <tr class="element-animation" style="background: rgba(4, 83, 190, 0.08);">
                          <td style="font-weight: 600;">От кого:</td>
                          <td><?echo $notify_sender;?></td>
                          <td style="font-weight: 600;">Тема:</td>
                          <td><?echo $notify_theme;?></td>
                        </tr>
                        <?
                            }
                        ?>
                        <?  $offs += 1;
                            $mp_notif = mysqli_query($connect_db, "SELECT * FROM `mphackt` ORDER BY `id` DESC LIMIT 1 OFFSET $offs");
                        
                            while($notify = mysqli_fetch_assoc($mp_notif)) {
                              $notify_id = $notify['id'];
                              $notify_tag = $notify['tag'];
                              $notify_sender = $notify['sender'];
                              $notify_theme = $notify['theme'];
                              $notify_image = $notify['image'];
                              $notify_content = $notify['content'];
                              $notify_creator = $notify['creator'];
                              $notify_upd = $notify['upd'];
                              $notify_visible = $notify['visible'];
                            }
                            if(($notify_tag == 'profcom' && $user_rang_profcom == '0') || ($notify_tag == 'ss' && $user_rang_ss == '0')) {
                            }
                            else {
                        ?>
                        <tr class="element-animation" style="background: rgba(4, 83, 190, 0.04);">
                          <td style="font-weight: 600;">От кого:</td>
                          <td><?echo $notify_sender;?></td>
                          <td style="font-weight: 600;">Тема:</td>
                          <td><?echo $notify_theme;?></td>
                        </tr>
                        <?
                          }
                        ?>
                        <?
                          if($user_name != "") {
                            $offs += 1;
                            $mp_notif = mysqli_query($connect_db, "SELECT * FROM `mphackt` ORDER BY `id` DESC LIMIT 10 OFFSET $offs");
                        
                            while($notify = mysqli_fetch_assoc($mp_notif)) {
                              $notify_id = $notify['id'];
                              $notify_tag = $notify['tag'];
                              $notify_sender = $notify['sender'];
                              $notify_theme = $notify['theme'];
                              $notify_image = $notify['image'];
                              $notify_content = $notify['content'];
                              $notify_creator = $notify['creator'];
                              $notify_upd = $notify['upd'];
                              $notify_visible = $notify['visible'];
                            if(($notify_tag == 'profcom' && $user_rang_profcom == '0') || ($notify_tag == 'ss' && $user_rang_ss == '0')) {
                            }
                            else {
                        ?>
                        <tr class="element-animation">
                          <td style="font-weight: 600;">От кого:</td>
                          <td><?echo $notify_sender;?></td>
                          <td style="font-weight: 600;">Тема:</td>
                          <td><?echo $notify_theme;?></td>
                        </tr>
                        <? 
                            }
                            }
                          }
                        ?>