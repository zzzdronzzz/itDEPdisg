<?php



@$form = $_POST['rull']; // вылетает предупреждение о пустой переменой по этому засобачил!

if ($form == '1.1') {
    
    echo '
    
    <form class="form-horizontal" id="rull" method = "post" action = "functions/regUser.php">
    <input type = "hidden" value = "1.1" name = "howWrite">
            <legend>Общая информация заявки</legend>
            <div id="blocks"><div class="control-group">
    <label class="control-label" for="inputEmail">Фамилия</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Фамилия" name="fam">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Имя</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Имя" name="name_user">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Очество</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Очество" name="faName">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Мобильный Телефон</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Телефон" name="mobPhone">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Рабочий Телефон</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Рабочий Телефон" name="workPhone">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Должность</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Должность" name="Dolgnost">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Отдел</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Отдел" name="depart">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Звено</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Звено" name="zveno">
    </div>
  </div></div>
            
            <legend>Сотруднику необходимо:</legend>
            
            <div id="blocks"><div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" name="compCheck">Вход в компьютер
                    </label>
                </div>
            </div>
            
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" class="emailShow" onchange="emailShows()" name="emailCheck">Почтовый ящик
                    </label>
                </div>
            </div>
                
                <div class="showEmail">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">
                            Почтовый домен
                        </label>
                        <div class="controls">
                            <select name="selectMail">
                                <option value="@po-korf.ru">@po-korf.ru</option>
                                <option value="@td-mg.ru">@td-mg.ru</option>
                                <option value="@tehnogr.ru">@tehnogr.ru</option>
                                <option value="@kn-s.ru">@kn-s.ru</option>
                                <option value="@airned.com">@airned.com</option>
                                <option value="@ovik.com">@ovik.com</option>
                                <option value="@intelekt-in.ru">@intelekt-in.ru</option>
                                <option value="@vilmann.ru">@vilmann.ru</option>
                                <option value="@korf.by">@korf.by</option>
                            </select>
                        </div>
                    </div>
                </div>
            
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" class="axaptaShow" onchange="axaptaShows()" name="axaptaCheck">Axapta
                    </label>
                </div>
            </div>
                
                <div class="showAxapta">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">
                            Права в Axapta
                        </label>
                        <div class="controls">
                            <input type="text" id="inputEmail" placeholder="Права в Axapta аналогично" name="rullAxapta">
                        </div>
                    </div>
                </div>
            
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" class="gppShow" onchange="gppShows()" name="gppCheck">Глобальная программа подбора (ГПП)
                    </label>
                </div>
            </div>
                
                <div class="showGpp">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">
                            Права в ГПП
                        </label>
                        <div class="controls">
                            <input type="text" id="inputEmail" placeholder="Права в ГПП аналогично" name="rullGPP">
                        </div>
                    </div>
                </div>
            
             <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" class="buhShow" onchange="buhShows()" name="buhCheck">1С 8.2 Бухгалтерские базы
                    </label>
                </div>
            </div>
                
                <div class="showBuh">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">
                            
                        </label>
                        <div class="controls">
                            <blockquote>
                                <p>Бла бла бла бла бла бла</p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            
             <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" class="baseShow" onchange="baseShows()" name="baseCheck">1С 8.2 Кадровые базы
                    </label>
                </div>
            </div>
                
                <div class="showBase">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">
                            
                        </label>
                        <div class="controls">
                            <blockquote>
                                <p>Бла бла бла бла бла бла</p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" class="tabShow" onchange="tabShows()" name="tabCheck">1С 8.2 Заполнение табеля
                    </label>
                </div>
            </div>
                
                <div class="showTab">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">
                            Права в табеле
                        </label>
                        <div class="controls">
                            <input type="text" id="inputEmail" placeholder="Права в табеле аналогично" name="rullTab" >
                        </div>
                    </div>
                </div>
            
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" name="garantCheck">Гарант, Консультант+
                    </label>
                </div>
            </div>
            
            <div class="control-group">
                <div class="controls">
                    <textarea rows="3" placeholder="Комментарий" name="coment"></textarea>
                </div>
            </div>
            
             
            
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Отправить</button>
    </div>
  </div></div>
  <br>
  <br>
</form>

    
    ';
    
} //по приходящей переменной выбирает какую форму брать

if ($form == '1.2') {
 
    echo '
    <form class="form-horizontal" id="rull" method = "post" action = "functions/regUser.php">
    <input type = "hidden" value = "1.2" name = "howWrite">
            <legend>Общая информация заявки</legend>
            <div id="blocks"><div class="control-group">
    <label class="control-label" for="inputEmail">Фамилия</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Фамилия" name="fam">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Имя</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Имя" name="name_user">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Очество</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Очество" name="faName">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Мобильный Телефон</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Телефон" name="mobPhone">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Рабочий Телефон</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Рабочий Телефон" name="workPhone">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Должность</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Должность" name="Dolgnost">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Отдел</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Отдел" name="depart">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Филиал</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Филиал" name="fil">
    </div>
  </div></div>
            
            <legend>Сотруднику необходимо:</legend>
            
            <div id="blocks">
               
            
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" class="emailShow" onchange="emailShows()" name="emailCheck">Почтовый ящик
                    </label>
                </div>
            </div>
                
                <div class="showEmail">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">
                            Почтовый домен
                        </label>
                        <div class="controls">
                            <select name="selectMail">
                                <option value="@po-korf.ru">@po-korf.ru</option>
                                <option value="@td-mg.ru">@td-mg.ru</option>
                                <option value="@tehnogr.ru">@tehnogr.ru</option>
                                <option value="@kn-s.ru">@kn-s.ru</option>
                                <option value="@airned.com">@airned.com</option>
                                <option value="@ovik.com">@ovik.com</option>
                                <option value="@intelekt-in.ru">@intelekt-in.ru</option>
                                <option value="@vilmann.ru">@vilmann.ru</option>
                                <option value="@korf.by">@korf.by</option>
                            </select>
                        </div>
                    </div>
                </div>
            
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" class="axaptaShow" onchange="axaptaShows()" name="axaptaCheck">Axapta
                    </label>
                </div>
            </div>
                
                <div class="showAxapta">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">
                            Права в Axapta
                        </label>
                        <div class="controls">
                            <input type="text" id="inputEmail" placeholder="Права в Axapta аналогично" name="rullAxapta">
                        </div>
                    </div>
                </div>
            
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" class="gppShow" onchange="gppShows()" name="gppCheck">Глобальная программа подбора (ГПП)
                    </label>
                </div>
            </div>
                
                <div class="showGpp">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">
                            Права в ГПП
                        </label>
                        <div class="controls">
                            <input type="text" id="inputEmail" placeholder="Права в ГПП аналогично" name="rullGPP">
                        </div>
                    </div>
                </div>
            
             
            
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" class="tabShow" onchange="tabShows()" name="tabCheck">1С 8.2 Заполнение табеля
                    </label>
                </div>
            </div>
                
                <div class="showTab">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">
                            Права в табеле
                        </label>
                        <div class="controls">
                            <input type="text" id="inputEmail" placeholder="Права в табеле аналогично" name="rullTab">
                        </div>
                    </div>
                </div>
            
            
            
            <div class="control-group">
                <div class="controls">
                    <textarea rows="3" placeholder="Комментарий" name="coment"></textarea>
                </div>
            </div>
            
             
            
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Отправить</button>
    </div>
  </div></div>
  <br>
  <br>
</form>

    
    ';
}

if ($form == '1.3') {
    
    echo '
    
    <form class="form-horizontal" id="rull" method = "post" action = "functions/regUser.php">
    <input type = "hidden" value = "1.3" name = "howWrite">
            <legend>Общая информация заявки</legend>
            <div id="blocks"><div class="control-group">
    <label class="control-label" for="inputEmail">Фамилия</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Фамилия" name="fam">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Имя</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Имя" name="name_user">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Очество</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Очество" name="faName">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Мобильный Телефон</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Телефон" name="mobPhone">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Рабочий Телефон</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Рабочий Телефон" name="workPhone">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Должность</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Должность" name="Dolgnost">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Отдел</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Отдел" name="depart">
    </div>
  </div>
            </div>
            
            <legend>Сотруднику необходимо:</legend>
            
            <div id="blocks"><div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" name="compCheck">Вход в компьютер
                    </label>
                </div>
            </div>
            
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" class="emailShow" onchange="emailShows()" name="emailCheck">Почтовый ящик
                    </label>
                </div>
            </div>
                
                <div class="showEmail">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">
                            Почтовый домен
                        </label>
                        <div class="controls">
                            <select name="selectMail">
                                <option value="@po-korf.ru">@po-korf.ru</option>
                                <option value="@td-mg.ru">@td-mg.ru</option>
                                <option value="@tehnogr.ru">@tehnogr.ru</option>
                                <option value="@kn-s.ru">@kn-s.ru</option>
                                <option value="@airned.com">@airned.com</option>
                                <option value="@ovik.com">@ovik.com</option>
                                <option value="@intelekt-in.ru">@intelekt-in.ru</option>
                                <option value="@vilmann.ru">@vilmann.ru</option>
                                <option value="@korf.by">@korf.by</option>
                            </select>
                        </div>
                    </div>
                </div>
            
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" class="axaptaShow" onchange="axaptaShows()" name="axaptaCheck">Axapta
                    </label>
                </div>
            </div>
                
                <div class="showAxapta">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">
                            Права в Axapta
                        </label>
                        <div class="controls">
                            <input type="text" id="inputEmail" placeholder="Права в Axapta аналогично" name="rullAxapta">
                        </div>
                    </div>
                </div>
            
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" class="gppShow" onchange="gppShows()" name="gppCheck">Глобальная программа подбора (ГПП)
                    </label>
                </div>
            </div>
                
                <div class="showGpp">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">
                            Права в ГПП
                        </label>
                        <div class="controls">
                            <input type="text" id="inputEmail" placeholder="Права в ГПП аналогично" name="rullGPP">
                        </div>
                    </div>
                </div>
            
             <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" class="buhShow" onchange="buhShows()" name="buhCheck">1С 8.2 Бухгалтерские базы
                    </label>
                </div>
            </div>
                
                <div class="showBuh">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">
                            
                        </label>
                        <div class="controls">
                            <blockquote>
                                <p>Бла бла бла бла бла бла</p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            
             <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" class="baseShow" onchange="baseShows()" name="baseCheck">1С 8.2 Кадровые базы
                    </label>
                </div>
            </div>
                
                <div class="showBase">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">
                            
                        </label>
                        <div class="controls">
                            <blockquote>
                                <p>Бла бла бла бла бла бла</p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" class="tabShow" onchange="tabShows()" name="tabCheck">1С 8.2 Заполнение табеля
                    </label>
                </div>
            </div>
                
                <div class="showTab">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">
                            Права в табеле
                        </label>
                        <div class="controls">
                            <input type="text" id="inputEmail" placeholder="Права в табеле аналогично" name="rullTab">
                        </div>
                    </div>
                </div>
            
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" name="garantCheck">Гарант, Консультант+
                    </label>
                </div>
            </div>
            
            <div class="control-group">
                <div class="controls">
                    <textarea rows="3" placeholder="Комментарий" name="coment"></textarea>
                </div>
            </div>
            
             
            
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Отправить</button>
    </div>
  </div></div>
  <br>
  <br>
</form>
    
    ';
    
}

if ($form == '1.4') {
 
    echo '
    
   <form class="form-horizontal" id="rull" method = "post" action = "functions/regUser.php">
   <input type = "hidden" value = "1.4" name = "howWrite">
            <legend>Общая информация заявки</legend>
            <div id="blocks"><div class="control-group">
    <label class="control-label" for="inputEmail">Фамилия</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Фамилия" name="fam">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Имя</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Имя" name="name_user">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Очество</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Очество" name="faName">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Мобильный Телефон</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Телефон" name="mobPhone">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Рабочий Телефон</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Рабочий Телефон" name="workPhone">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Должность</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Должность" name="Dolgnost">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Отдел</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Отдел" name="depart">
    </div>
  </div>
            </div>
            
            <legend>Сотруднику необходимо:</legend>
            
            <div id="blocks"><div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" name="compCheck">Вход в компьютер
                    </label>
                </div>
            </div>
            
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" class="emailShow" onchange="emailShows()" name="emailCheck">Почтовый ящик
                    </label>
                </div>
            </div>
                
                <div class="showEmail">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">
                            Почтовый домен
                        </label>
                        <div class="controls">
                            <select name="selectMail">
                                <option value="@po-korf.ru">@po-korf.ru</option>
                                <option value="@td-mg.ru">@td-mg.ru</option>
                                <option value="@tehnogr.ru">@tehnogr.ru</option>
                                <option value="@kn-s.ru">@kn-s.ru</option>
                                <option value="@airned.com">@airned.com</option>
                                <option value="@ovik.com">@ovik.com</option>
                                <option value="@intelekt-in.ru">@intelekt-in.ru</option>
                                <option value="@vilmann.ru">@vilmann.ru</option>
                                <option value="@korf.by">@korf.by</option>
                            </select>
                        </div>
                    </div>
                </div>
            
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" class="axaptaShow" onchange="axaptaShows()" name="axaptaCheck">Axapta
                    </label>
                </div>
            </div>
                
                <div class="showAxapta">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">
                            Права в Axapta
                        </label>
                        <div class="controls">
                            <input type="text" id="inputEmail" placeholder="Права в Axapta аналогично" name="rullAxapta">
                        </div>
                    </div>
                </div>
            
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" class="gppShow" onchange="gppShows()" name="gppCheck">Глобальная программа подбора (ГПП)
                    </label>
                </div>
            </div>
                
                <div class="showGpp">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">
                            Права в ГПП
                        </label>
                        <div class="controls">
                            <input type="text" id="inputEmail" placeholder="Права в ГПП аналогично" name="rullGPP">
                        </div>
                    </div>
                </div>
            
             <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" class="buhShow" onchange="buhShows()" name="buhCheck">1С 8.2 Бухгалтерские базы
                    </label>
                </div>
            </div>
                
                <div class="showBuh">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">
                            
                        </label>
                        <div class="controls">
                            <blockquote>
                                <p>Бла бла бла бла бла бла</p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            
             <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" class="baseShow" onchange="baseShows()" name="baseCheck">1С 8.2 Кадровые базы
                    </label>
                </div>
            </div>
                
                <div class="showBase">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">
                            
                        </label>
                        <div class="controls">
                            <blockquote>
                                <p>Бла бла бла бла бла бла</p>
                            </blockquote>
                        </div>
                    </div>
                </div>
            
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" class="tabShow" onchange="tabShows()" name="tabCheck">1С 8.2 Заполнение табеля
                    </label>
                </div>
            </div>
                
                <div class="showTab">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">
                            Права в табеле
                        </label>
                        <div class="controls">
                            <input type="text" id="inputEmail" placeholder="Права в табеле аналогично" name="rullTab">
                        </div>
                    </div>
                </div>
            
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" name="garantCheck">Гарант, Консультант+
                    </label>
                </div>
            </div>
            
            <div class="control-group">
                <div class="controls">
                    <textarea rows="3" placeholder="Комментарий" name="coment"></textarea>
                </div>
            </div>
            
             
            
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Отправить</button>
    </div>
  </div></div>
  <br>
  <br>
</form>
    ';
    
}

if ($form == '1.5') {
    
    echo '
    
    <form class="form-horizontal" id="rull" method = "post" action = "functions/regUser.php">
    <input type = "hidden" value = "1.5" name = "howWrite">
            <legend>Общая информация заявки</legend>
            <div id="blocks"><div class="control-group">
    <label class="control-label" for="inputEmail">Фамилия</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Фамилия" name="fam">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Имя</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Имя" name="name_user">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Очество</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Очество" name="faName">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Мобильный Телефон</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Телефон" name="mobPhone">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Рабочий Телефон</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Рабочий Телефон" name="workPhone">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Должность</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Должность" name="Dolgnost">
    </div>
  </div>
            <div class="control-group">
    <label class="control-label" for="inputEmail">Отдел</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Отдел" name="depart">
    </div>
  </div>
                <div class="control-group">
    <label class="control-label" for="inputEmail">Обособленное подразделение </label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="Обособленное подразделение" name="podraz">
    </div>
  </div>
                
            </div>
            
            <legend>Сотруднику необходимо:</legend>
            
            <div id="blocks">
               
            
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" class="emailShow" onchange="emailShows()" name="emailCheck">Почтовый ящик
                    </label>
                </div>
            </div>
                
                <div class="showEmail">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">
                            Почтовый домен
                        </label>
                        <div class="controls">
                            <select name="selectMail">
                                <option value="@po-korf.ru">@po-korf.ru</option>
                                <option value="@td-mg.ru">@td-mg.ru</option>
                                <option value="@tehnogr.ru">@tehnogr.ru</option>
                                <option value="@kn-s.ru">@kn-s.ru</option>
                                <option value="@airned.com">@airned.com</option>
                                <option value="@ovik.com">@ovik.com</option>
                                <option value="@intelekt-in.ru">@intelekt-in.ru</option>
                                <option value="@vilmann.ru">@vilmann.ru</option>
                                <option value="@korf.by">@korf.by</option>
                            </select>
                        </div>
                    </div>
                </div>
            
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" class="axaptaShow" onchange="axaptaShows()" name="axaptaCheck">Axapta
                    </label>
                </div>
            </div>
                
                <div class="showAxapta">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">
                            Права в Axapta
                        </label>
                        <div class="controls">
                            <input type="text" id="inputEmail" placeholder="Права в Axapta аналогично" name="rullAxapta">
                        </div>
                    </div>
                </div>
            
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" class="gppShow" onchange="gppShows()" name="gppCheck">Глобальная программа подбора (ГПП)
                    </label>
                </div>
            </div>
                
                <div class="showGpp">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">
                            Права в ГПП
                        </label>
                        <div class="controls">
                            <input type="text" id="inputEmail" placeholder="Права в ГПП аналогично" name="rullGPP">
                        </div>
                    </div>
                </div>
            
             
            
            <div class="control-group">
                <div class="controls">
                    <label class="checkbox">
                        <input type="checkbox" class="tabShow" onchange="tabShows()" name="tabCheck">1С 8.2 Заполнение табеля
                    </label>
                </div>
            </div>
                
                <div class="showTab">
                    <div class="control-group">
                        <label class="control-label" for="inputEmail">
                            Права в табеле
                        </label>
                        <div class="controls">
                            <input type="text" id="inputEmail" placeholder="Права в табеле аналогично" name="rullTab">
                        </div>
                    </div>
                </div>
            
            
            
            <div class="control-group">
                <div class="controls">
                    <textarea rows="3" placeholder="Комментарий" name="coment"></textarea>
                </div>
            </div>
            
             
            
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn">Отправить</button>
    </div>
  </div></div>
  <br>
  <br>
</form>
    
    ';
    
}

?>