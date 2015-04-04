<body>
    <div id="wrapper">
        <?php echo $navigation; ?>
        <div id="page-wrapper">
            <div>
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="page-header">Новая накладная "СМГС - Накладная малой скорости"</h2>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <form action="" name="addWB">
                        <div class="col-md-12">
                            <div class="form-group form-group-head">
                                <label>Имя</label>
                                <input type="text" name="name" class="form-control" value="">
                            </div>
                        </div>
                        <!--LEFT FORM-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Код дороги отправителя</label>
                                <input type="text" name="senderRoadCode" class="form-control" value="21" disabled>
                            </div>
                            <div class="form-group">
                                <label>Код станции отправителя</label>
                                <input type="text" name="senderStationCode" class="form-control" value="140304" disabled>
                            </div>
                            <div class="form-group">
                                <label>Код отправителя</label>
                                <input type="text" class="form-control" name="senderCode" value="0476" disabled>
                            </div>
                            <div class="form-group">
                                <label>Отправитель</label>
                                <textarea class="form-control" name="sender" rows="2" disabled>ОАО «БЕЛГИПС», 220038 БЕЛАРУСЬ г.Минск ул.Козлова 24, р/с: 3012100982015 МФО: 153001369, банк: ОАО БПС-СБЕРБАНК Минск, УНП: 10007096, ОКПО: 294697000</textarea>
                            </div>
                            <div class="form-group">
                                <label>Код получателя</label>
                                <input type="text" class="form-control" name="recipientCode" value="<?php if($clone) { ?><?php echo $clone->recipientCode; ?><?php } ?>">
                            </div>
                            <div class="form-group">
                                <label>Получатель</label>
                                <textarea class="form-control" name="recipient" rows="2"><?php if($clone) { ?><?php echo $clone->recipient; ?><?php } ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Станция отправления</label>
                                <input type="text" class="form-control" name="dispatchStation" value="МИНСК-ВОСТОЧНЫЙ БЧ 140304" disabled>
                            </div>
                            <div class="form-group">
                                <label>Особые заявления отправителя</label>
                                <textarea class="form-control" name="specificApplicationSender" rows="2"><?php if($clone) { ?><?php echo $clone->specificApplicationSender; ?><?php } ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Отметки, необязательные для жд</label>
                                <textarea class="form-control" name="optionalMarks" rows="2"><?php if($clone) { ?><?php echo $clone->optionalMarks; ?><?php } ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Наименование груза</label>
                                <textarea class="form-control" name="shippingName" rows="2"><?php if($clone) { ?><?php echo $clone->shippingName; ?><?php } ?></textarea>
                            </div>
                            <div class="form-group">
                                <label>Номер вагона</label>
                                <input type="text" class="form-control" name="wagonNumber" value="<?php if($clone) { ?><?php echo $clone->wagonNumber; ?><?php } ?>">
                            </div>
                            <div class="form-group">
                                <label>Грузоподъемность</label>
                                <input type="text" class="form-control" name="carryingCapacity" value="<?php if($clone) { ?><?php echo $clone->carryingCapacity; ?><?php } ?>">
                            </div>
                            <div class="form-group">
                                <label>Кол-во осей</label>
                                <select class="form-control" name="axesNumber">
                                    <option <?php if($clone && $clone->axesNumber == "4") { ?>selected='selected'<?php } ?> value="4">4</option>
                                    <option <?php if($clone && $clone->axesNumber == "6") { ?>selected='selected'<?php } ?> value="6">6</option>
                                    <option <?php if($clone && $clone->axesNumber == "8") { ?>selected='selected'<?php } ?> value="8">8</option>
                                </select>
                            </div>
                        </div>
                        <!--RIGHT FORM-->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Тара вагона</label>
                                <input type="text" class="form-control" name="wagonTara" value="<?php if($clone) { ?><?php echo $clone->wagonTara; ?><?php } ?>">
                            </div>
                            <div class="form-group">
                                <label>Станция назначения</label>
                                <input type="text" class="form-control" name="stationDestination" value="<?php if($clone) { ?><?php echo $clone->stationDestination; ?><?php } ?>">
                            </div>
                            <div class="form-group">
                                <label>Дорога назначения</label>
                                <input type="text" class="form-control" name="roadDestination" value="<?php if($clone) { ?><?php echo $clone->roadDestination; ?><?php } ?>">
                            </div>
                            <div class="form-group">
                                <label>Код дороги</label>
                                <input type="text" class="form-control" name="roadCode" value="<?php if($clone) { ?><?php echo $clone->roadCode; ?><?php } ?>">
                            </div>
                            <div class="form-group">
                                <label>Код станции назначения</label>
                                <input type="text" class="form-control" name="codeStationDestination" value="<?php if($clone) { ?><?php echo $clone->codeStationDestination; ?><?php } ?>">
                            </div>
                            <div class="form-group">
                                <label>ГНГ</label>
                                <input type="text" class="form-control" name="GNG" value="<?php if($clone) { ?><?php echo $clone->GNG; ?><?php } ?>">
                            </div>
                            <div class="form-group">
                                <label>ЕТСНГ</label>
                                <input type="text" class="form-control" name="ETSNG" value="<?php if($clone) { ?><?php echo $clone->ETSNG; ?><?php } ?>">
                            </div>
                            <div class="form-group">
                                <label>Итого место</label>
                                <input type="text" class="form-control" name="summaryPlace" value="<?php if($clone) { ?><?php echo $clone->summaryPlace; ?><?php } ?>">
                            </div>
                            <div class="form-group">
                                <label>Итого масса</label>
                                <input type="text" class="form-control" name="summaryWeight" value="<?php if($clone) { ?><?php echo $clone->summaryWeight; ?><?php } ?>">
                            </div>
                            <div class="form-group">
                                <label>Итого место(прописью)</label>
                                <input type="text" class="form-control" name="summaryPlaceWords" value="<?php if($clone) { ?><?php echo $clone->summaryPlaceWords; ?><?php } ?>">
                            </div>
                            <div class="form-group">
                                <label>Итого масса(прописью)</label>
                                <input type="text" class="form-control" name="summaryWeightWords" value="<?php if($clone) { ?><?php echo $clone->summaryWeightWords; ?><?php } ?>">
                            </div>
                            <div class="form-group">
                                <label>Объявленная ценность груза</label>
                                <input type="text" class="form-control" name="declaredFreightValue" value="<?php if($clone) { ?><?php echo $clone->declaredFreightValue; ?><?php } ?>">
                            </div>
                            <div class="form-group">
                                <label>Пломбы отправителя</label>
                                <select class="form-control" name="sealsNumber">
                                    <option <?php if($clone && $clone->sealsNumber == "2") { ?>selected='selected'<?php } ?> value="2">2</option>
                                    <option <?php if($clone && $clone->sealsNumber == "4") { ?>selected='selected'<?php } ?> value="4">4</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Пломбы</label>
                                <input type="text" class="form-control" name="seals" value="<?php if($clone) { ?><?php echo $clone->seals; ?><?php } ?>">
                            </div>
                            <div class="form-group">
                                <label>Способ определения массы</label>
                                <input type="text" class="form-control" name="massMethodDeterm" value="<?php if($clone) { ?><?php echo $clone->massMethodDeterm; ?><?php } ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="btn-bottom">
                                <button type="button" id="addWB" class="btn btn-success btn-lg pull-right">Создать</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>