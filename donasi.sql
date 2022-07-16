CREATE TABLE LOKASI_BENCANA ( 
    ID_LOKASI NUMBER(10) PRIMARY KEY, 
    NAMA_BENCANA VARCHAR2(50) NOT NULL, 
    LOKASI VARCHAR2(100) NOT NULL,
    JUMLAH_KORBAN NUMBER(10) NOT NULL,
    TOTAL_DONASI NUMBER
);

CREATE TABLE USER_DONASI (
    ID_USER NUMBER(10) PRIMARY KEY,
    ID_LOKASI NUMBER(10) NOT NULL,
    NAMA VARCHAR2(50) NOT NULL,
    TELEPON NUMBER(15) NOT NULL,
    JUMLAH_DONASI NUMBER NOT NULL,
    CONSTRAINT ID_LOKASI_FK FOREIGN KEY(ID_LOKASI) REFERENCES LOKASI_BENCANA(ID_LOKASI)
);

INSERT INTO LOKASI_BENCANA
VALUES (1, 'Erupsi Gunung Semeru', 'Kabupaten Malang dan Kabupaten Lumajang Jawa Timur', 9977, 0);

INSERT INTO USER_DONASI
VALUES (1, 1, 'Arya', 08816263425, 1000000);

CREATE OR REPLACE TRIGGER "SYSTEM"."UPDATE_TOTAL_DONASI"
AFTER INSERT OR UPDATE OR DELETE ON USER_DONASI
FOR EACH ROW
BEGIN
    IF INSERTING THEN
        UPDATE LOKASI_BENCANA SET TOTAL_DONASI=TOTAL_DONASI+:NEW.JUMLAH_DONASI WHERE ID_LOKASI=:NEW.ID_LOKASI;
    ELSIF UPDATING THEN
            UPDATE LOKASI_BENCANA SET TOTAL_DONASI=TOTAL_DONASI+:NEW.JUMLAH_DONASI WHERE ID_LOKASI=:NEW.ID_LOKASI;
            UPDATE LOKASI_BENCANA SET TOTAL_DONASI=TOTAL_DONASI-:OLD.JUMLAH_DONASI WHERE ID_LOKASI=:OLD.ID_LOKASI;
    ELSIF DELETING THEN
        UPDATE LOKASI_BENCANA SET TOTAL_DONASI=TOTAL_DONASI-:OLD.JUMLAH_DONASI WHERE ID_LOKASI=:OLD.ID_LOKASI;
    END IF;
END;
/