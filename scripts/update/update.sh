#!/bin/sh

WEBHOME=~/htdocs/Code
CONF=${WEBHOME}/application/config
BACKUP_BASE=~/htdocs/backup
BACKUP_HOME=${BACKUP_BASE}/`date +%Y%m%d%H%M%S`
SRC_ZIP=master.zip
SRC_UNZIP=XiaoLongBao-master

clean_backup()
{
  # Keep the most recent 5 backups.
  backups=`ls -tp ${BACKUP_BASE} | tail -n +6`
  for bk in ${backups}
  do
      echo "Removing stale backup ${bk} <br>"
      rm -rf ${BACKUP_BASE}/${bk}
  done
}

if [ -d "${SRC_UNZIP}" ]; then
   rm -rf ${SRC_UNZIP}
fi

echo "backup home: ${BACKUP_HOME} <br>"
mkdir -p ${BACKUP_HOME}
mkdir -p ${BACKUP_HOME}/config

echo "unzip ${SRC_ZIP} <br>"
unzip ${SRC_ZIP} > /dev/null 2>&1

echo "Backup configuration. <br>"
cp -rf ${CONF}/* ${BACKUP_HOME}/config

echo "Backup and setup application <br>"
mv ${WEBHOME}/application ${BACKUP_HOME}/application
mv ${SRC_UNZIP}/application ${WEBHOME}/application

echo "Restoring configuration <br>"
cp -rf ${BACKUP_HOME}/config/config.php ${CONF}
cp -rf ${BACKUP_HOME}/config/database.php ${CONF}

echo "Backup and setup assets <br>"
mv ${WEBHOME}/assets ${BACKUP_HOME}/assets
mv ${SRC_UNZIP}/assets ${WEBHOME}/assets

echo "Backup and setup CodeIgnitor system <br>"
mv ${WEBHOME}/system ${BACKUP_HOME}/system
mv ${SRC_UNZIP}/system ${WEBHOME}/system

clean_backup
echo "Upgrade Done! <br>"
