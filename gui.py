import getpass

import oracledb

un = 'rpmanoha@(DESCRIPTION=(ADDRESS=(PROTOCOL=TCP)(Host=oracle.scs.ryerson.ca)(Port =1521))(CONNECT_DATA=(SID=orcl)))'


cs = 'localhost/orclpdb'
pw = '04309408'

with oracledb.connect(user=un, password=pw, dsn=cs) as connection:
    with connection.cursor() as cursor:
        sql = """select sysdate from dual"""
        for r in cursor.execute(sql):
            print(r)
            print("Test")